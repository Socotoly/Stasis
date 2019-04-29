<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['user_id', 'model_id', 'model_type'];
    protected $with = ['user','records'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function records()
    {
        return $this->morphTo('model');
    }
}
