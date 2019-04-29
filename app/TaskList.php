<?php

namespace App;

use App\Traits\HasPath;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskList extends Model
{
    use HasPath, SoftDeletes;

    protected $fillable = ['title', 'description', 'parent_id', 'parent_type'];

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function parent(){
        return $this->morphTo();
    }
}
