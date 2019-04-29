<?php

namespace App\Traits;

use App\Permission;
use App\User;

trait HasPermissions
{
    public function permissions(User $user)
    {
        return $this->morphToMany(Permission::class,'model','permission_user')->wherePivot('user_id',$user->id)->withPivot('subject')->get();
    }
}