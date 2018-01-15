<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 15-Dec-17
 * Time: 16:54
 */

namespace App\Shipping;


use Illuminate\Support\Collection;

class Manager
{
    public $shippingOptions;

    public function __construct()
    {
        $this->shippingOptions = Collection::make([]);
    }

    public function all()
    {
        return $this->shippingOptions;
    }

    public function get($identifier)
    {
        return $this->shippingOptions->get($identifier);
    }

    public function put($identifier, $class)
    {
        $this->shippingOptions->put($identifier, $class);

        return $this;
    }
}