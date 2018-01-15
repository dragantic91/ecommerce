<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/23/2017
 * Time: 1:05 AM
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Database\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the user addresses.
     */
    public function index()
    {
        $user = Auth::user(); // LOGED IN USER

        $addresses = Address::where('user_id', '=', $user->id)->get(); // VRACA ADRESE TRENUTNOG USERA IZ BAZE

        return view('front.address.my-account.address')
            ->with('user', $user)
            ->with('addresses', $addresses);
    }
}