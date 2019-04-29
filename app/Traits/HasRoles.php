<?php

namespace App\Traits;


use App\Permission;
use App\Role;

trait HasRoles
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withPivot(['model_id','model_type','subject']);
    }

//    public function can()
//    {
//
//    }
}