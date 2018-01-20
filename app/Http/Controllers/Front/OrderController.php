<?php

namespace App\Http\Controllers\Front;

use DB;
use Session;
use App\Models\Database\User;
use App\Models\Database\Order;
use App\Models\Database\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Jobs\SendVerificationEmail;
use Stripe\{Stripe, Charge, Customer};

class OrderController extends Controller
{
	public function place(Request $request)
	{
		if (!auth()->check()) {
			$this->validate($request, [
				'billing_terms_and_conditions' => 'required',
				'billing_first_name' => 'required',
				'billing_last_name' => 'required',
				'billing_address' => 'required',
				'billing_postcode' => 'required',
				'billing_city' => 'required',
				'email' => 'required|email|unique:users',
				'password' => 'required|confirmed',
				'password_confirmation' => 'required',
				'shipping_first_name' => 'required_with:use_different_shipping_address',
				'shipping_last_name' => 'required_with:use_different_shipping_address',
				'shipping_address' => 'required_with:use_different_shipping_address',
				'shipping_postcode' => 'required_with:use_different_shipping_address',
				'shipping_city' => 'required_with:use_different_shipping_address',
			], ['billing_agree' => __('validation.accepted')]);
		} else {
			$this->validate($request, [
				'billing_terms_and_conditions' => 'required',
				'shipping_first_name' => 'required_with:use_different_shipping_address',
				'shipping_last_name' => 'required_with:use_different_shipping_address',
				'shipping_address' => 'required_with:use_different_shipping_address',
				'shipping_postcode' => 'required_with:use_different_shipping_address',
				'shipping_city' => 'required_with:use_different_shipping_address',
			]);
		}

		$cartItems = Session::get('cart');

		DB::transaction(function () use ($cartItems) {
			if (!auth()->check()) {
				$user = new User;
                $user->title = "Her";
				$user->first_name = request('billing_first_name');
				$user->last_name = request('billing_last_name');
				$user->phone = request('billing_phone');
				$user->email = request('email');
				$user->password = bcrypt(request('password'));
				$user->token = base64_encode(request('email'));
				$user->save();

                event(new Registered($user));
                dispatch(new SendVerificationEmail($user));

				$address = new Address;
				$address->type = 'BILLING';
				$address->first_name = request('billing_first_name');
				$address->last_name = request('billing_last_name');
				$address->address1 = request('billing_address');
				$address->address2 = request('billing_address2');
				$address->postcode = request('billing_postcode');
				$address->city = request('billing_city');
				$address->phone = request('billing_phone');

				$user->addresses()->save($address);
			} else {
				$user = auth()->user();
				$address = $user->addresses()->where('type', 'BILLING')->first();
			}

			if (request('use_different_shipping_address') == 'on') {
				$shippingAddress = new Address;
				$shippingAddress->type = 'SHIPPING';
				$shippingAddress->first_name = request('shipping_first_name');
				$shippingAddress->last_name = request('shipping_last_name');
				$shippingAddress->address1 = request('shipping_address');
				$shippingAddress->address2 = request('shipping_address2');
				$shippingAddress->postcode = request('shipping_postcode');
				$shippingAddress->city = request('shipping_city');
				$shippingAddress->phone = request('shipping_phone');

				$user->addresses()->save($shippingAddress);
			}

			$pickupSyncedData = [];
			$deliverySyncedData = [];
			foreach ($cartItems as $id => $item) {
				if (array_key_exists('for_delivery', $item)) {
					if ($item['for_delivery'] === true) {
						$cartItemsForDelivery[] = $item;
						$deliverySyncedData[$id] = [
							'qty' => $item['qty'], 
							'price' => $item['price'], 
							'tax_amount' => $item['delivery_price']
						];
					} else if ($item['for_delivery'] === false) {
						$cartItemsForPickup[] = $item;
						$pickupSyncedData[$id] = [
							'qty' => $item['qty'], 
							'price' => $item['price'], 
							'tax_amount' => $item['delivery_price']
						];
					}
				}
			}

			if (!empty($cartItemsForDelivery)) {
				$orderForDelivery = new Order;
				$orderForDelivery->user_id = $user->id;
				$orderForDelivery->billing_address_id = $address->id;
				$orderForDelivery->shipping_address_id = isset($shippingAddress) ? $shippingAddress->id : null;
				$orderForDelivery->payment_option = 'Lieferung';
				$orderForDelivery->order_status_id = 1;
				$orderForDelivery->total_amount = Session::get('deliveryTotal');
				$orderForDelivery->save();

				$orderForDelivery->products()->sync($deliverySyncedData, false);
			}

			if (!empty($cartItemsForPickup)) {
				$orderForPickup = new Order;
				$orderForPickup->user_id = $user->id;
				$orderForPickup->billing_address_id = $address->id;
				$orderForPickup->shipping_address_id = isset($shippingAddress) ? $shippingAddress->id : null;
				$orderForPickup->payment_option = 'Abholung';
				$orderForPickup->order_status_id = 1;
				$orderForPickup->total_amount = Session::get('pickupTotal');
				$orderForPickup->save();

				$orderForPickup->products()->sync($pickupSyncedData, false);
			}

			Stripe::setApiKey(config('stripe.secret_key'));

			try {
				$customer = Customer::create([
					'email' => request('stripeEmail'),
					'source' => request('stripeToken'),
				]);
				$user->stripe_id = $customer->id;
				$user->save();

				Charge::create([
					'customer' => $user->stripe_id,
					'amount' => Session::get('total') * 100,
					'currency' => 'chf',
				]);

				Session::forget('cart');
				Session::flash('order_made', __('front.order_successfully_made'));

			} catch (\Exception $e) {
				return response()->json([
					'status' => $e->getMessage()
				], 422);
			}
		});
	}
}
