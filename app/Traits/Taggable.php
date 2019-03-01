<?php

namespace App\Traits;


use App\Tag;
use App\TagItem;

trait Taggable
{
    public function tags()
    {
        return $this->morphMany(Tag::class, 'taggable');
    }

    public function allowedTags()
    {
        return $this->morphMany(TagItem::class, 'allowed');
    }

    public function tag($tagId)
    {
        if (!$this->isAllowedToTag($tagId)){
            return;
        }

        $this->tags()->create([
            'tag_item_id' => $tagId,
            'taggable_id' => $this->id,
            'taggable_type' => self::class
        ]);

        return $this;
    }

    public function unTag($tagId)
    {
        $this->tags()->where('tag_item_id', $tagId)->delete();

        return $this;
    }

    public function getAllowedTagsAttribute()
    {
        return $this->allowedTags()->orWhereNull('allowed_id')->get();
    }

    private function isAllowedToTag($tag)
    {
        return (($this->allowedTags->contains('id', $tag)) ? true : false);
    }
}