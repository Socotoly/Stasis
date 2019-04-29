<?php

namespace App;

use App\Traits\HasPath;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'body', 'task_id'];

    protected $with = ['owner'];

    public function subject(){
        return $this->morphTo();
    }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function path($api = null)
    {
        $api = $api ? '/api' : '';
        return "$api/tasks/" . $this->subject->id . "/replies/$this->id";
    }

}
