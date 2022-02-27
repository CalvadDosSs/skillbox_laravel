@extends('layout.master')

@section('content')

    <style>
        .article {
            max-width: 800px;
            border: 3px solid black;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }

        h2 a {
            text-decoration: none;
            color: dodgerblue;
        }
    </style>

    @include('layout.error')

    @foreach($articles as $article)
        @include('articles.item')
    @endforeach

@endsection
