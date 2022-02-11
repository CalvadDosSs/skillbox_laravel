<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormValidate;
use App\Models\Article;
class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view('index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(FormValidate $formValidate)
    {
        $attributes = $formValidate->validated();

        Article::create($attributes);

        return redirect(route('main'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article, FormValidate $formValidate)
    {
        $attributes = $formValidate->validated();

        $article->update($attributes);
        $success = true;

        return view('articles.show', compact('success', 'article'));
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('main'));
    }
}
