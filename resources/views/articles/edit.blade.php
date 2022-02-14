@extends('layout.master')

@section('content')

    @include('layout.error')

    <style>
        form {
            text-align: center;
        }

        [type='text'],
        [type='submit'],
        textarea {
            width: 500px;
            margin: 10px 0;
            padding: 10px;
            border: 2px black solid;
            border-radius: 10px;
            font-size: 16px;
        }

        [type='submit'] {
            background-color: green;
            color: white;
            font-size: 18px;
        }
    </style>

    <form action="{{ route('articles.show', ['article' => $article]) }}" method="POST">

        @csrf
        @method('PATCH')

        @include('articles.form')

        <input class="change_article_button" type="submit" value="Изменить" name="change_article_button">
    </form>

    @include('articles.delete')

@endsection
