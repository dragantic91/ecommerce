<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 15-Dec-17
 * Time: 17:24
 */

namespace App\Shipping;


use Illuminate\Support\Facades\Session;

class FreeShipping extends Shipping implements ShippingInterface
{
    protected $identifier;
    protected $title;
    protected $amount;

    public function __construct()
    {
        $this->identifier = 'pickup';
        $this->title = 'Pickup From Store';
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function getAmount()
    {
        $orderData = Session::get('order_data');
        $cartProducts = Session::get('cart');
        $this->process($orderData, $cartProducts);

        return $this->amount;
    }

    public function process($orderData, $cartProducts)
    {
        $this->amount = 0.00;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
}