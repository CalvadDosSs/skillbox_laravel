<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormValidate;
use App\Http\Requests\TagsFormRequest;
use App\Services\TagsSynchronizer;
use App\Models\Article;
use App\Models\Tag;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->latest()->get();

        return view('index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create(Article $article)
    {
        return view('articles.create', compact('article'));
    }

    public function store(FormValidate $formValidate, TagsFormRequest $tagsFormRequest, TagsSynchronizer $tagsSynchronizer)
    {
        $attributes = $formValidate->validated();

        Article::create($attributes);

        $tags = $tagsFormRequest->prepareForValidation();
        $article = Article::all()->last();

        $tagsSynchronizer->sync($tags, $article);

        return redirect(route('main'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article, FormValidate $formValidate, TagsFormRequest $tagsFormRequest, TagsSynchronizer $tagsSynchronizer)
    {
        $attributes = $formValidate->validated();

        $article->update($attributes);
        $success = true;

        $tags = $tagsFormRequest->prepareForValidation();

        $tagsSynchronizer->sync($tags, $article);

        return view('articles.show', compact('success', 'article'));
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('main'));
    }
}
