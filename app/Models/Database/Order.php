<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/26/2017
 * Time: 11:29 AM
 */

namespace App\Models\Database;


class Order extends BaseModel
{
    protected $fillable = [
        'shipping_address_id',
        'billing_address_id',
        'user_id',
        'shipping_option',
        'payment_option',
        'order_status_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('price', 'qty', 'tax_amount');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function orderReturnRequest() {
        return $this->hasOne(OrderReturnRequest::class);
    }

    public function getShippingAddressAttribute()
    {
        $shippingAddress = Address::findorfail($this->attributes['shipping_address_id']);

        return $shippingAddress;
    }

    public function getOrderStatusTitleAttribute()
    {
        return $this->orderStatus->name;
    }

    public function getBillingAddressAttribute()
    {
        $address = Address::findorfail($this->attributes['billing_address_id']);

        return $address;
    }
}