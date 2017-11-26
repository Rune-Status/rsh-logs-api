<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Snippet;

class Post extends Model
{
    protected $guarded = [];

    function author()
    {
        return $this->belongsTo(Author::class);
    }

    function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    function snippets()
    {
        return $this->hasMany(Snippet::class);
    }
}
