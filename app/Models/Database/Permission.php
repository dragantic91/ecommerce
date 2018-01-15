<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/20/2017
 * Time: 1:30 PM
 */

namespace App\Models\Database;


use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name'];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public static function getPermissionByName($name)
    {
        $instance = new static;
        return $instance->where('name', '=', $name)->first();
    }
}