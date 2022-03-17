@extends('layout.without_sidebar')

@section('content')

    @include('layout.error')

<form class="create_news" action="{{ route('news.store') }}" method="POST">

    @include('news.form')

    <input class="create_news_button" type="submit" value="Создать" name="create_news_button">
</form>


@endsection
