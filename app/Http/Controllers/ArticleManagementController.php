<?php

namespace App\Http\Controllers;

use App\Services\TagsSynchronizer;
use App\Models\Article;

class ArticleManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        (auth()->user()->isAdmin()) ?
            $articles = Article::with('tags')->latest()->get() :
            $articles = Article::where('user_id', auth()->id())->with('tags')->latest()->get()
        ;

        return view('index', compact('articles'));
    }
}
