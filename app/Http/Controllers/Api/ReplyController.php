<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReplyResource;
use App\Reply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Model $model)
    {
        return ReplyResource::collection($model->replies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Model $model
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Model $model, Request $request)
    {
        $reply = $model->replies()->create([
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);

        return ReplyResource::make($reply->load('owner'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return Reply
     */
    public function show(Reply $reply)
    {
        return $reply;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        $reply->update([
            'body' => $request->body
        ]);

        return response([], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model, Reply $reply)
    {
        $reply->delete();

        return response([], 200);
    }
}
