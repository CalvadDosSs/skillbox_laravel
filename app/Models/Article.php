<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\ArticleCreated;
use App\Events\ArticleChanged;
use App\Events\ArticleDeleted;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => ArticleCreated::class,
        'updated' => ArticleChanged::class,
        'deleted' => ArticleDeleted::class,
    ];

    public function getRouteKeyName ()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::updating( function(Article $article) {

            $history = $article->getDirty();
            $article->history()->attach(auth()->id(), [
                'before' => Arr::only($article->fresh()->toArray(), array_keys($history)),
                'after' => $history,
            ]);
        });
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commented');
    }

    public function isPublished() : bool
    {
        return (bool) $this->publication;
    }

    public function days($days)
    {
        return $this->created_at > Carbon::now()->subDays($days);
    }

    public function history()
    {
        return $this->belongsToMany(User::class, 'article_histories')
            ->using(ArticleHistory::class)
            ->withPivot(['before', 'after', 'created_at'])
            ->withTimestamps();
    }
}
