@extends('layout.master')

@section('content')

    @include('layout.error')

    <style>
        .create {
            text-align: center;
        }

        [type='text'],
        .create_article_button,
        textarea {
            width: 500px;
            margin: 10px 0;
            padding: 10px;
            border: 2px black solid;
            border-radius: 10px;
            font-size: 16px;
        }

        .create .create_article_button {
            background-color: green;
            color: white;
            font-size: 18px;
        }    </style>

        <form class="create" action="{{ route('main') }}" method="post">

            @csrf

            @include('articles.form')

            <input class="create_article_button" type="submit" value="Создать" name="create_article_button">
        </form>
    </div>

@endsection
