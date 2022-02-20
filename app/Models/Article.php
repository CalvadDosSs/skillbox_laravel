<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\ArticleCreated;
use App\Events\ArticleChanged;
use App\Events\ArticleDeleted;

class Article extends Model
{
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

    public function tags ()
    {
        return $this->belongsToMany(Tag::class, 'tag_article');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
