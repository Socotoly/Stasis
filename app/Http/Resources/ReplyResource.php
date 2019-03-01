<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'body' => $this->body,
                'updated_at' => $this->updated_at,
                'creator' => UserResource::make($this->owner),
            ],
            'meta' => [
                'links' => [
                    'self' => $this->path(),
                    'api' => $this->path('api')
                ]
            ]
        ];
    }
}
