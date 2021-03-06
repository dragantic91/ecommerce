<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 11/20/2017
 * Time: 1:23 PM
 */

namespace App\Models\Database;


class Role extends BaseModel
{
    protected $fillable = ['name', 'description'];

    public function user()
    {
        return $this->hasMany(AdminUser::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permissionName)
    {
        $permissions = explode(',', $permissionName);

        $returnData = true;
        foreach ($permissions as $permission) {
            if ($this->permissions->pluck('name')->contains($permission) == false) {
                $returnData = false;
            }
        }
        return $returnData;
    }
}