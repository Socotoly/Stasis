<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function projects()
    {
        return $this->morphedByMany(Project::class, 'model','permission_user');
    }

    public function departments()
    {
        return $this->morphedByMany(Department::class, 'model','permission_user');
    }
}
