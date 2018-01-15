<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/20/2017
 * Time: 12:51 PM
 */

namespace App\Models\Database;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class AdminUser extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'role_id', 'is_super_admin', 'confirmed'];

    protected $hidden = ['password', 'remember_token'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}