<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Http\Resources\Topic as TopicResource;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TopicResource::collection(
            Topic::withCount('posts', 'snippets')
                    ->orderByDesc('revision')
                    ->paginate()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return TopicResource::make(
            $topic
            // $topic->load('post', 'author')
        );
    }
}
