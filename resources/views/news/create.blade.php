@extends('layout.without_sidebar')

@section('content')

<form class="create_news" action="{{ route('news.index') }}" method="post">

    @include('news.form')

    <input class="create_news_button" type="submit" value="Создать" name="create_news_button">
</form>


@endsection
