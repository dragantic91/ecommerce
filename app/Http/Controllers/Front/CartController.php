<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 14-Dec-17
 * Time: 10:54
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Database\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;
use Stripe\{Charge, Customer};

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = (null === Session::get('cart')) ? Collection::make([]) : Session::get('cart');

        $product = Product::where('slug', '=', $request->get('slug'))->first();

        $qty = (null === $request->get('qty')) ? 1 : $request->get('qty');

        if ($cart->has($product->id)) {
            $item = $cart->pull($product->id);
            $item['qty'] += $qty;
            $cart->put($product->id, $item);
        } else {
            if ($product->discount == 1)
                $price = $product->discount_price;
            else
                $price = $product->price;

            $cart->put($product->id, [
                'id' => $product->id,
                'qty' => $qty,
                'price' => $price,
                'image' => $product->image->smallUrl,
                'name' => $product->name,
                'slug' => $product->slug,
                'delivery' => $product->delivery,
                'delivery_price' => $product->delivery_price,
            ]);
        }

        Session::put('cart', $cart);
        return redirect()->back()->with('notificationText', 'Der Artikel wurde erfolgreich in den Warenkorb hinzugefügt!');
    }

    public function view()
    {
        $cartProducts = Session::get('cart');

        return view('front.cart.view')
            ->with('cartProducts', $cartProducts);
    }

    public function update(Request $request)
    {
        $cartData = Session::get('cart');
        $qty = $request->get('qty');


        if (!is_numeric($qty)) {
            $item = $cartData->pull($request->get('productId'));
            $item['qty'] = 1;
            $cartData->put($request->get('productId'), $item);
        } elseif ($qty == 0) {
            $cartData->pull($request->get('productId'));
        } else {
            $item = $cartData->pull($request->get('productId'));
            $item['qty'] = $qty;
            $cartData->put($request->get('productId'), $item);
        }

        Session::put('cart', $cartData);

        //return redirect()->back();
        return JsonResponse::create(['status' => true, 'cart' => Session::get('cart')]);
    }

    public function updateDelivery(Request $request)
    {
        $cartData = Session::get('cart');
        $aDelivery = $request->input('delivery');
        if ($aDelivery == null) {
            $aDelivery = [];
        }
        $hasDelivery = false;
        $hasPickup = false;

        foreach ($cartData as $item) {
            if (in_array($item['id'], $aDelivery)) {
                $pom = $cartData->pull($item['id']);
                $pom['for_delivery'] = true;
                $cartData->put($pom['id'], $pom);
                $hasDelivery = true;
            }
            else {
                $pom = $cartData->pull($item['id']);
                $pom['for_delivery'] = false;
                $cartData->put($pom['id'], $pom);
                $hasPickup = true;
            }
            // $item = $cartData->pull($request->get('productId'));
            // $item['qty'] = request('qty');
            // $cartData->put($request->get('productId'), $item);
        }

        // dd($cartData);

        Session::put('cart', $cartData);
        Session::put('hasDelivery', $hasDelivery);
        Session::put('hasPickup', $hasPickup);

        //return redirect()->back();
        return redirect('/checkout');
    }

    public function destroy($id)
    {
        $cartData = Session::get('cart');
        $cartData->pull($id);

        Session::put('cart', $cartData);

        return redirect()->back();
    }
}