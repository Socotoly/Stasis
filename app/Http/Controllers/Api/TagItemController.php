<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\TagItem;
use Illuminate\Http\Request;

class TagItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return TagItem::create([
            'name' => $request->name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\TagItem $tagItem
     * @return bool
     */
    public function update(Request $request, TagItem $tagItem)
    {
        return $tagItem->update([
            'name' => $request->name
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TagItem $tagItem
     * @return void
     * @throws \Exception
     */
    public function destroy(TagItem $tagItem)
    {
        $tagItem->removeAllTags()->delete();
    }
}
