<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit']]);
    }

    public function index()
    {
        $news = News::where('publication', '!=', '0')->simplePaginate(10);

        return view('news.news', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function create(News $news)
    {
        return view('news.create', compact('news'));
    }

    public function store(NewsRequest $newsRequest)
    {
        $attributes = $newsRequest->validated();
        $attributes['user_id'] = auth()->id();

        News::create($attributes);

        return redirect(route('news.index'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(News $news, NewsRequest $newsRequest)
    {
        $attributes = $newsRequest->validated();
        $news->update($attributes);

        return view('news.show', compact( 'news'));
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect(route('news.index'));
    }

}