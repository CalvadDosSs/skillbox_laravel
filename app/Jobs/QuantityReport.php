<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\Report;

class QuantityReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $models = [];
    protected $user;

    public function __construct($models, $user)
    {
        $this->models = $models;
        $this->user = $user;
    }

    public function handle()
    {
        $count = [];

        if (array_key_exists('articles', $this->models)) {
            $count[] = 'Количество статей: ' . \App\Models\Article::count();
        }
        if (array_key_exists('news', $this->models)) {
            $count[] = 'Количество новостей: ' . \App\Models\News::count();
        }
        if (array_key_exists('users', $this->models)) {
            $count[] = 'Количество пользователей: ' . \App\Models\User::count();
        }
        if (array_key_exists('tags', $this->models)) {
            $count[] = 'Количество тегов: ' . \App\Models\Tag::count();
        }
        if (array_key_exists('comments', $this->models)) {
            $count[] = 'Количество комментариев: ' . \App\Models\Comment::count();
        }

        $this->user->notify(new Report($count));
    }
}
