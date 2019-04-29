<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagItem extends Model
{
    use SoftDeletes;

    public function tagged()
    {
        return $this->hasMany(Tag::class);
    }

    public function allowedOn()
    {
        return $this->morphTo('allowed');
    }

    public function removeAllTags()
    {
        $this->tagged()->each(function ($item, $key){
            $item->delete();
        });

        return $this;
    }
}
