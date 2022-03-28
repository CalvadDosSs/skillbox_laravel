@extends('layout.master')

@section('content')

    @include('layout.error')
        <form class="update" action="{{ route('articles.show', ['article' => $article]) }}" method="POST">

            @csrf
            @method('PATCH')

            @include('articles.form')

            <input class="update_button" type="submit" value="Изменить" name="change_article_button">
        </form>

    @include('articles.delete')

@endsection
