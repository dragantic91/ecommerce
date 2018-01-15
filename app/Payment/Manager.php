<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 15-Dec-17
 * Time: 17:40
 */

namespace App\Payment;


use Illuminate\Support\Collection;

class Manager
{
    public $paymentOption;

    public function __construct()
    {
        $this->paymentOption = Collection::make([]);
    }

    public function all()
    {
        return $this->paymentOption;
    }

    public function get($identifier)
    {
        return $this->paymentOption->get($identifier);
    }

    public function put($identifier, $class)
    {
        $this->paymentOption->put($identifier, $class);

        return $this;
    }
}