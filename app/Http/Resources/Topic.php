<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Topic extends Resource
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
            'title' => $this->title,
            'revision' => $this->when($this->revision > 0, (int) $this->revision),
            'created_at' => (string) $this->created_at,
        ];
    }

    public function with($request)
    {
        return [
            'links' => [
                'forum' => 'http://rs-hacking.com/forum/index.php?/topic/'.$this->id.'-',
                'snippets' => route('api.v1.topic-snippets', [$this]),
                // 'author' => route('api.v1.authors.index', [$this->author]),
                // 'snippets' => route('api.v1.author-snippets.index', $this->author),
            ],
        ];
    }
}
