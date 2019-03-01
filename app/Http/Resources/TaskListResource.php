<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskListResource extends JsonResource
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
                    'title' => $this->title,
                    'description' => $this->description,
                    'created_at' => $this->created_at,
                    'tasks' => (TaskResource::collection($this->tasks)),
                ],
            'meta' => [
                'links' => [
                    'self' => $this->path(),
                    'api' => $this->apiPath(),
                ]
            ],
        ];
    }

//    /**
//     * Get additional data that should be returned with the resource array.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return array
//     */
//    public function with($request)
//    {
//        return [
//            'meta' => [
//                'links' => [
//                    'self' => $this->path(),
//                    'api' => $this->apiPath(),
//                ]
//            ],
//        ];
//    }
}
