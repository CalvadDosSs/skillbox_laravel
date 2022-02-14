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

    <form action="{{ route('main') }}" method="post">

        @csrf

        @include('articles.form')

        <input type="submit" value="Создать" name="create_article_button">
    </form>

@endsection
