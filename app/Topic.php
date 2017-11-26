<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Support\Arr;

class Topic extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    function posts()
    {
        return $this->hasMany(Post::class);
    }

    function snippets()
    {
        return $this->hasMany(Snippet::class);
    }

    function originalPost()
    {
        return $this->hasOne(Post::class)
                ->orderBy('created_at', 'asc')
                ->take(1);
    }

    public static function getRevisionFromTitle(string $title)
    {
        preg_match('~^#(?P<rev>\d+)$~', $title, $matches);

        if (!Arr::has($matches, 'rev')) {
            return null;
        }

        return (int) $matches['rev'];
    }

    public function getRouteKeyName()
    {
        return 'revision';
    }
}
