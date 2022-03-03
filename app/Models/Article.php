<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\ArticleCreated;
use App\Events\ArticleChanged;
use App\Events\ArticleDeleted;
use Illuminate\Support\Carbon;

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

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_article');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isPublished() : bool
    {
        return (bool) $this->publication;
    }

    public function days($days)
    {
        return $this->created_at > Carbon::now()->subDays($days);
    }
}
