<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag_item_id', 'taggable_id', 'taggable_type'];
    protected $with = ['item'];

    public function item()
    {
        return $this->belongsTo(TagItem::class, 'tag_item_id');
    }

    public function subjects()
    {
        $this->morphTo('taggable');
    }

}
