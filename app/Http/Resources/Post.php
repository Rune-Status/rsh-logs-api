<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Post extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'topic_id' => (int) $this->topic_id,
            'author_id' => (int) $this->author_id,
            'created_at' => (string) $this->created_at,
        ];
    }
}
