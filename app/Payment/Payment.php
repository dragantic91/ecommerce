<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 15-Dec-17
 * Time: 17:41
 */

namespace App\Payment;


abstract class Payment
{
    abstract public function process($orderData, $cartProducts);
}