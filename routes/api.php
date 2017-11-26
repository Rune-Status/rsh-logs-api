<?php

Route::get('authors', 'AuthorController@index')
    ->name('api.v1.authors.index');

Route::get('authors/{author}', 'AuthorController@show')
    ->name('api.v1.authors.show');

Route::get('authors/{author}/snippets', 'AuthorSnippetController@index')
    ->name('api.v1.author-snippets.index');

Route::get('snippets', 'SnippetController@index')
    ->name('api.v1.snippets.index');

Route::get('revisions', 'TopicController@index')
    ->name('api.v1.topics.index');

Route::get('revisions/{topic}', 'TopicController@show')
    ->name('api.v1.topics.show');

Route::get('revisions/{topic}/snippets', 'TopicSnippetController@index')
    ->name('api.v1.topic-snippets');
