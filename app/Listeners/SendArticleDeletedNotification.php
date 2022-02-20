<?php

namespace App\Listeners;

use App\Events\ArticleDeleted;
use App\Mail\ArticleDeleted as ArticleDeletedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleDeletedNotification
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\ArticleDeleted $event
     * @return void
     */
    public function handle(ArticleDeleted $event)
    {
        \Mail::to($event->article->owner->email)->send(
            new ArticleDeletedMail($event->article)
        );
    }
}
