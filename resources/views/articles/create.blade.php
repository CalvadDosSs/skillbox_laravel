@extends('layout.master')

@section('content')

    @include('layout.error')

        <form class="create" action="{{ route('main') }}" method="post">

            @csrf

            @include('articles.form')

            <input class="create_button" type="submit" value="Создать" name="create_article_button">
        </form>
    </div>

@endsection
