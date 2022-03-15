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

    .send_comments {
        text-align: center;
    }

    .comment {
        width: 90%;
        height: 150px;
        margin-bottom: 20px;
    }

    .comments {
        max-width: 1000px;
        margin: 20px auto;
        padding: 20px 20px 5px 20px;
        background-color: lightgray;
        border-radius: 10px;
        border: 0 solid lightgray;
    }

    .comment_email {
        font-weight: bold;
    }

    .comment_created_at {
        font-size: 12px !important;
        color: darkcyan;
        font-style: italic;
    }

    .changes span
    {
        font-weight: bold;
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

    @admin(auth()->user())

    <div class="changes">

    <hr>

    <h3>Изменения статьи:</h3>

        @forelse($article->history as $history)
            <p><span>Автор изменения:</span> {{ $history->email }} </p>
            <p><span>Измененено:</span> {{ $history->pivot->created_at->diffForHumans() }} </p>
            <p><span>Было:</span> {{ Arr::query($history->pivot->before) }} </p>
            <p><span>Стало:</span> {{ Arr::query($history->pivot->after) }} </p>
        @empty
            <p>Изменений не было</p>
        @endforelse

    </div>

    @endadmin

    <hr>

    <div class="send_comments">
        <h3>Оставить комментарий:</h3>

        <form action="{{ route('comment', ['article' => $article]) }}" method="POST">

            @csrf

            <textarea class="comment" name="comment" id="comment">{{ old('comment') }}</textarea>
            <input class="comment_button" type="submit" value="Опубликовать">
        </form>

        <h3>Комментарии:</h3>

    </div>

    @foreach($article->comments as $comment)
        <div class="comments">
            <p class="comment_email"> Автор: {{ $comment->owner->email }} </p>
            <hr>
            <p class="comment_body"> {{ $comment->comment }} </p>
            <p class="comment_created_at"> {{ $comment->created_at->toFormattedDateString() }} </p>
        </div>
    @endforeach

@endsection
