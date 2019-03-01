<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\TagItem;
use Illuminate\Database\Eloquent\Model;

class TagController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Model $model
     * @param TagItem $tag
     * @return void
     */
    public function store(Model $model, TagItem $tag)
    {
        $model->tag($tag->id);

        return response(['type'=>'success','message'=>'Tag has been attached'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Model $model
     * @param TagItem $tag
     * @return void
     */
    public function destroy(Model $model, TagItem $tag)
    {
        $model->untag($tag->id);

        return response(['type'=>'success','message'=>'Tag has been deattached']);
    }
}
