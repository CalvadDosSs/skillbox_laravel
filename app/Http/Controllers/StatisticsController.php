<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $author = User::select('name', DB::raw('COUNT(articles.user_id) AS count'))
            ->join('articles', 'users.id', '=', 'articles.user_id')
            ->groupBy('users.id')
            ->orderBy('count', 'DESC')
            ->limit(1)
            ->get();

        $longestArticle = Article::select('title', 'slug', 'body')
            ->where('body', '=', Article::max('body'))
            ->get();

        $shortestArticle = Article::select('title', 'slug', 'body')
            ->where('body', '=', Article::min('body'))
            ->get();

        $changedArticle = Article::select('articles.title', 'articles.slug', DB::raw('count(article_histories.article_id) AS count'))
            ->join('article_histories', 'articles.id', '=', 'article_histories.article_id')
            ->groupBy('articles.id')
            ->orderBy('count', 'DESC')
            ->limit(1)
            ->get();

        $discussedArticle = Article::select('articles.title', 'articles.slug', DB::raw('COUNT(commenteds.commented_id) AS count'))
            ->join('commenteds', 'articles.id', '=', 'commenteds.commented_id')
            ->groupBy('articles.id')
            ->where('commenteds.commented_type', 'LIKE', '%Article')
            ->orderBy('count', 'DESC')
            ->get();

        $averageCountArticles = DB::select('SELECT AVG(count) AS avg
            FROM
                (SELECT count(articles.user_id) AS count
                FROM articles
                LEFT JOIN users
                    ON users.id = articles.user_id
                GROUP BY (users.id)) AS article_count');

        return view('statistics',
            compact('countArticles', 'countNews', 'longestArticle', 'shortestArticle', 'author', 'changedArticle', 'discussedArticle', 'averageCountArticles'));
    }
}
