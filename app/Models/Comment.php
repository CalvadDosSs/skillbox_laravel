<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'commented');
    }

    public function news()
    {
        return $this->morphedByMany(News::class, 'commented');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
