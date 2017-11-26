<?php

namespace App\Http\Controllers;

use App\Snippet;
use App\Topic;
use App\Http\Resources\Snippet as SnippetResource;
use Illuminate\Http\Request;

class TopicSnippetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function index(Topic $topic)
    {
        return SnippetResource::collection(
            $topic->snippets()
                    ->with('author')
                    ->paginate()
        );
    }
}
