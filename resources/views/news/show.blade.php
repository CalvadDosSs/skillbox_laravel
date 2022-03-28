@extends('layout.without_sidebar')

<style>

</style>

@section('content')

    <div class="news">
        <h1> {{ $news->title }} </h1>

        @admin(auth()->user())
            <a class="change_news" href="{{ route('news.edit', ['news' => $news]) }}">Изменить</a>
        @endadmin

        @include('articles.tags', ['tags' => $news->tags])
        <hr>
        <p class="news_body"> {{ $news->body }} </p>
    </div>

    <div class="back">
        <a href="{{ route('news.index') }}"><-- Вернуться на главную</a>
    </div>

    <hr>

    <div class="send_comments">
        <h3>Оставить комментарий:</h3>

        <form action="{{ route('news.comment', ['news' => $news]) }}" method="POST">

            @csrf

            <textarea class="comment" name="comment" id="comment">{{ old('comment') }}</textarea>
            <input class="comment_button" type="submit" value="Опубликовать">
        </form>

        <h3>Комментарии:</h3>

    </div>

    @if($news->comments !== null)

        @foreach($news->comments as $comment)
            <div class="comments">
                <p class="comment_email"> Автор: {{ $comment->owner->email }} </p>
                <hr>
                <p class="comment_body"> {{ $comment->comment }} </p>
                <p class="comment_created_at"> {{ $comment->created_at->toFormattedDateString() }} </p>
            </div>
        @endforeach

    @endif

@endsection
