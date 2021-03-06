<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Article;

class CommentsController extends Controller
{
    public function store(Article $article, CommentFormRequest $commentFormRequest)
    {
        $attributes = $commentFormRequest->validated();
        $attributes['user_id'] = auth()->id();

        $comment = Comment::create($attributes);
        $comment->articles()->attach($article->id);

        return back();
    }
}
