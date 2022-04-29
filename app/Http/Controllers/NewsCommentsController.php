<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\News;

class NewsCommentsController extends Controller
{
    public function store(News $news, CommentFormRequest $commentFormRequest)
    {
        $attributes = $commentFormRequest->validated();
        $attributes['user_id'] = auth()->id();

        $comment = Comment::create($attributes);
        $comment->news()->attach($news->id);

        return back();
    }
}
