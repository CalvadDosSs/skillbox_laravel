@extends('layout.without_sidebar')

@section('content')

<form class="update_news" action="{{ route('news.show', ['news' => $news]) }}" method="post">

    @method('PATCH')
    @include('news.form')

    <input class="update_news_button" type="submit" value="Изменить" name="update_news_button">
</form>

@include('news.delete')


@endsection
