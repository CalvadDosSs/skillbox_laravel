@extends('layout.without_sidebar')

@section('content')

    <div class="news_wrapper">

            <h1 class="tags_h1">Новости:</h1>

        @foreach($news as $item)

            <div class="news">
                <h2 class="news_title">
                    <a href="{{ route('news.show', ['news' => $item]) }}">{{ $item->title }} »</a>
                </h2>

                @include('articles.tags', ['tags' => $item->tags])

                <p class="news_body"> {{ $item->body }} </p>
                </p>
            </div>

        @endforeach
    </div>

    <div class="article_wrapper">

            <h1 class="tags_h1">Статьи:</h1>

        @foreach($articles as $article)

        <div class="article">
            <h2 class="article_title"><a href="{{ route('articles.show', ['article' => $article]) }}">{{ $article->title }}</a></h2>

            @include('articles.tags', ['tags' => $article->tags])

            <p class="article_description"> Описание: {{ $article->description }}</p>
            <p class="article_body"> {{ $article->body }} </p>
            </p>
        </div>

        @endforeach
    </div>


@endsection
