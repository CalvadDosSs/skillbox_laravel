<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormValidate;
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

        $articleTags = $article->tags->keyBy('name');
        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; });
        $syncIds = $articleTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($articleTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);

            $syncIds[] = $tag->id;
        }

        $article->tags()->sync($syncIds);

        return view('articles.show', compact('success', 'article'));
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('main'));
    }
}
