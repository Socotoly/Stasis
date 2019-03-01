<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
                'creator' => (new UserResource($this->creator)),
                'list' =>  [
                        'id' => $this->list->id,
                        'title' => $this->list->title
                ],
                'parent' => [
                        'id' => $this->parent ? $this->parent->id : null,
                        'title' => $this->parent ? $this->parent->title : null
                ],
    //            'child' => TaskResource::make($this->child),
                'title' => $this->title,
                'description' => $this->description,
                'start_date' => $this->start_date,
                'due_date' => $this->due_date,
                'priority' => $this->priority,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'completed_at' => $this->completed_at,
                'closed_at' => $this->closed_at,
            ]
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'meta' => [
                'links' => [
                    'self' => $this->path(),
                    'api' => $this->apiPath(),
                ]
            ],
        ];
    }
}
