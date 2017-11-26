<?php

namespace App\Http\Controllers;

use App\Snippet;
use App\Author;
use App\Http\Resources\Snippet as SnippetResource;
use Illuminate\Http\Request;

class AuthorSnippetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function index(Author $author)
    {
        return SnippetResource::collection(
            $author->snippets()
                    ->with('topic')
                    ->paginate()
        );
    }
}
