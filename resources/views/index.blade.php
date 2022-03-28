@extends('layout.master')

@section('content')

    @include('layout.error')

    @foreach($articles as $article)
        @include('articles.item')
    @endforeach

    {{ $articles->links() }}

@endsection
