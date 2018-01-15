<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 15-Dec-17
 * Time: 17:42
 */

namespace App\Payment;


interface PaymentInterface
{
    public function getIdentifier();

    public function getTitle();

    public function isEnabled();
}