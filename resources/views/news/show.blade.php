@extends('layout.without_sidebar')

<style>

</style>

@section('content')

    <div class="news">
        <h1> {{ $item->title }} </h1>

        @admin(auth()->user())
            <a class="change_news" href="{{ route('news.edit', [$item]) }}">Изменить</a>
        @endadmin

        @include('articles.tags', ['tags' => $item->tags])
        <hr>
        <p class="news_body"> {{ $item->body }} </p>
    </div>

    <div class="back">
        <a href="{{ route('news.index') }}"><-- Вернуться на главную</a>
    </div>

    @include('layout.comment')

@endsection
