<?php

namespace App\Listeners;

use App\Events\ArticleChanged;
use App\Mail\ArticleChanged as ArticleChangedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleChangedNotification
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\ArticleChanged $event
     * @return void
     */
    public function handle(ArticleChanged $event)
    {
        \Mail::to($event->article->owner->email)->send(
            new ArticleChangedMail($event->article)
        );
    }
}
