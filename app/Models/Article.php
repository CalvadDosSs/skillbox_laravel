<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function getRouteKeyName ()
    {
        return 'slug';
    }

    public function tags ()
    {
        return $this->belongsToMany(Tag::class, 'tag_article');
    }
}