<?php

namespace App\Traits;

use App\Follow;
use Illuminate\Database\Eloquent\Model;

trait Follower
{
    public function follows()
    {
        return $this->hasMany(Follow::class);
    }

    public function follow(Model $model)
    {
        return $model->addFollower($this);
    }

    public function unFollow(Model $model)
    {
        return $model->removeFollower($this);
    }
}