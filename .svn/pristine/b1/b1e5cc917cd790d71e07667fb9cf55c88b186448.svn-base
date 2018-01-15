<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/26/2017
 * Time: 12:22 PM
 */

namespace App\Models\Database;


class OrderStatus extends BaseModel
{
    protected $fillable = ['name', 'is_default'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}