<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\News;
use App\Models\User;

class StatisticsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $countArticles = Article::count();
        $countNews = News::count();

        $longestArticle = Article::select('title', 'slug', 'body')
            ->where('body', '=', Article::max('body'))
            ->get();

        $shortestArticle = Article::select('title', 'slug', 'body')
            ->where('body', '=', Article::min('body'))
            ->get();

        $author = User::select('name')
            ->withCount('articles')
            ->orderBy('articles_count', 'DESC')
            ->take(1)
            ->get();

        $changedArticle = Article::select('title', 'slug')
            ->withCount('history')
            ->orderBy('history_count', 'DESC')
            ->take(1)
            ->get();

        $discussedArticle = Article::select('title', 'slug')
            ->withCount(['comments' => function($query) {
                $query->where('commented_type', 'LIKE', '%Article');
            }])
            ->orderBy('comments_count', 'DESC')
            ->take(1)
            ->get();

        $averageCountArticles = User::withCount('articles')
            ->get()
            ->where('articles_count', '>=', 1)
            ->avg('articles_count');

        return view('statistics',
            compact('countArticles', 'countNews', 'longestArticle', 'shortestArticle', 'author', 'changedArticle', 'discussedArticle', 'averageCountArticles'));
    }
}
