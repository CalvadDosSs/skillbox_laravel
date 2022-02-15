<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\Tag;

class TagsSynchronizer
{
    public function sync(Collection $tags, Model $model)
    {
        $articleTags = $model->tags->keyBy('name');
        $syncIds = $articleTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($articleTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);

            $syncIds[] = $tag->id;
        }

        $model->tags()->sync($syncIds);
    }
}
