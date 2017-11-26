<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    protected $guarded = [];

    function author()
    {
        return $this->belongsTo(Author::class);
    }

    function post()
    {
        return $this->belongsTo(Post::class);
    }

    function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
