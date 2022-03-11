<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleHistory extends Model
{
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
