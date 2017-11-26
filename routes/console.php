<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Author;
use App\Topic;
use Illuminate\Support\Arr;
use App\Post;
use Carbon\Carbon;
use App\Snippet;

Artisan::command('import-snippets {file}', function () {
    $filename = $this->argument('file');

    $handle = fopen($filename, 'r');
    if ($handle) {
        while ( ($line = fgets($handle)) !== false) {
            $content = json_decode($line);

            $in_topic = (array) $content->topic;
            Arr::forget($in_topic, 'url');
            Arr::set($in_topic, 'revision', Topic::getRevisionFromTitle($in_topic['title']));

            $author = Author::firstOrCreate((array) $content->author);
            $topic = Topic::firstOrCreate($in_topic);
            
            $post = Post::firstOrCreate([
                'id' => $content->id,
            ], [
                'topic_id' => $topic->id,
                'author_id' => $author->id,
                'created_at' => Carbon::parse($content->posted_at),
            ]);

            $post->snippets()->save(
                new Snippet([
                    'topic_id' => $topic->id,
                    'author_id' => $author->id,
                    'body' => $content->body,
                    'created_at' => $post->created_at,
                ])
            );
        }

        fclose($handle);
    } else {
        $this->error('Unable to open file');
    }
});

Artisan::command('fix-topic-timestamps', function () {
    Topic::has('originalPost')->get()->each(function (Topic $topic) {
        if ($topic->created_at->ne($topic->originalPost->created_at)) {
            $this->info($topic->id.'  '. $topic->originalPost->created_at);
            $topic->created_at = $topic->originalPost->created_at;
            $topic->save();
        }
    });

    Snippet::with('post')->each(function (Snippet $snippet) {
        if ($snippet->created_at->ne($snippet->post->created_at)) {
            $this->info($snippet->id . '  ' . $snippet->post->created_at);
            $this->created_at = $snippet->post->created_at;
            $this->save();
        }
    });
});
