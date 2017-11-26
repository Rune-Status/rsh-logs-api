<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Topic;
use App\Http\Resources\Author;

class Snippet extends Resource
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
            'snippet_id' => (int) $this->id,
            'post_id' => (int) $this->post_id,
            'author_id' => (int) $this->author_id,
            'topic_id' => (int) $this->topic_id,
            'author' => Author::make($this->whenLoaded('author')),
            'topic' => Topic::make($this->whenLoaded('topic')),
            'post' => Post::make($this->whenLoaded('post')),
            'body' => (string) $this->body,
            'created_at' => (string) $this->created_at,
        ];
    }
}
