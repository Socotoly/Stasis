<?php

namespace App;

use App\Traits\Follower;
use App\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles, Follower;

    protected $appends = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function assignedTasks()
    {
        return $this->belongsToMany(Task::class)->wherePivot('type', 'Assignee');
    }

    public function followedTasks()
    {
        return $this->belongsToMany(Task::class)->wherePivot('type', 'Follower');
    }

}
