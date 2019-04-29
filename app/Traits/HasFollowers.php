<?php

namespace App\Traits;


use App\User;

Trait HasFollowers
{
    public function followers()
    {
        return $this->morphToMany(User::class,'model','follows')->withTimestamps();
    }

    public function addFollower(User $user)
    {
        $this->followers()->attach($user);

        return $user;
    }

    public function removeFollower(User $user)
    {
        $this->followers()->detach($user);

        return $user;
    }
}