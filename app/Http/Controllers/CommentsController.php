<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store()
    {
        $comment = new Comment();

        $this->validate(request(), [
            'comment' => 'required|max:500',
            'user_id' => '',
            'articleId' => '',
        ]);

        $comment->comment = request('comment');
        $comment->user_id = auth()->id();

        $comment->save();
        $comment->articles()->attach(\request('articleId'));

        return back();
    }
}
