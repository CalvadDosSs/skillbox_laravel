<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $countArticles = DB::table('articles')->count();
        $countNews = DB::table('news')->count();
        $author = DB::table('users')
            ->select('name', DB::raw('COUNT(articles.user_id) AS count'))
            ->join('articles', 'users.id', '=', 'articles.user_id')
            ->groupBy('users.id')
            ->orderBy('count', 'DESC')
            ->limit(1)
            ->get();

        $longestArticle = DB::table('articles')
            ->select('title', 'slug', 'body')
            ->where('body', '=', DB::table('articles')->max('body'))
            ->get();

        $shortestArticle = DB::table('articles')
            ->select('title', 'slug', 'body')
            ->where('body', '=', DB::table('articles')->min('body'))
            ->get();

        $changedArticle = DB::table('articles')
            ->select('articles.title', 'articles.slug', DB::raw('count(article_histories.article_id) AS count'))
            ->join('article_histories', 'articles.id', '=', 'article_histories.article_id')
            ->groupBy('articles.id')
            ->orderBy('count', 'DESC')
            ->limit(1)
            ->get();

        $discussedArticle = DB::table('articles')
            ->select('articles.title', 'articles.slug', DB::raw('COUNT(commenteds.commented_id) AS count'))
            ->join('commenteds', 'articles.id', '=', 'commenteds.commented_id')
            ->groupBy('articles.id')
            ->where('commenteds.commented_type', 'LIKE', '%Article')
            ->orderBy('count', 'DESC')
            ->get();

//        $averageCountArticles = DB::table('users')
//            ->select(DB::raw('COUNT(articles.user_id) AS count'))
//            ->leftJoin('articles', 'users.id', '=', 'articles.user_id')
//            ->groupBy('users.id')
//            ->get();

        $averageCountArticles = DB::select('SELECT avg(count) AS avg
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
