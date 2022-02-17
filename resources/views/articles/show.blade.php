@extends('layout.master')

<style>
    .article,
    .back {
        max-width: 1000px;
    }

    .article h1 {
        margin: 20px auto;
        display: inline;
    }

    .article p
    {
        padding: 0 20px;
    }

    .article .change {
        padding: 5px;
        background-color: lightskyblue;
        border-radius: 2px;
    }
</style>

@section('content')

    @include('layout.success')

    <div class="article">
        <h1> {{ $article->title }} </h1>

        @can('update', $article)
            <a class="change" href="{{ route('articles.edit', ['article' => $article]) }}">Изменить</a>
        @endcan

        @include('articles.tags', ['tags' => $article->tags])
        <hr>
        <p class="article_description"> {{ $article->description }} </p>
        <hr>
        <p class="article_body"> {{ $article->body }} </p>
    </div>

    <div class="back">
        <a href="{{ route('main') }}"><-- Вернуться на главную</a>
    </div>

@endsection
