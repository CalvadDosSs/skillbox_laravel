<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function getRouteKeyName ()
    {
        return 'name';
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'tag_article');
    }
}