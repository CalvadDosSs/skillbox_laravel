@extends('layout.without_sidebar')

@section('content')

    @include('layout.error')

<form class="update_news" action="{{ route('news.update', ['news' => $news]) }}" method="POST">

    @method('PATCH')
    @include('news.form')

    <input class="update_news_button" type="submit" value="Изменить" name="update_news_button">
</form>

@include('news.delete')

@endsection
