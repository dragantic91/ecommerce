<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 09-Dec-17
 * Time: 12:42
 */

namespace App\Models\Database;


class UserViewedProduct extends BaseModel
{
    protected $fillable = ['user_id', 'product_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}