<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 15-Dec-17
 * Time: 16:52
 */

namespace App\Shipping;


interface ShippingInterface
{
    public function getIdentifier();

    public function getTitle();

    public function getAmount();
}