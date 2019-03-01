<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagItem extends Model
{

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
