<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Snippet;
use App\Post;

class Author extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public $casts = [
        'snippets_count' => 'int',
        'posts_count' => 'int',
    ];

    function snippets()
    {
        return $this->hasMany(Snippet::class);
    }

    function posts()
    {
        return $this->hasMany(Post::class);
    }
}
