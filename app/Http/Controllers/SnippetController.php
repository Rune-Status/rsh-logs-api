<?php

namespace App\Http\Controllers;

use App\Snippet;
use Illuminate\Http\Request;
use App\Http\Resources\Snippet as SnippetResource;

class SnippetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SnippetResource::collection(
            Snippet::with('topic')
                    ->paginate()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function show(Snippet $snippet)
    {
        //
    }
}
