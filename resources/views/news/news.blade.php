@extends('layout.without_sidebar')

@section('content')

    <div class="news_wrapper">

        @foreach($news as $item)

        <div class="news">
            <h2 class="news_title">
                <a href="{{ route('news.show', ['news' => $item]) }}">{{ $item->title }} »</a>
            </h2>

            <p class="news_body"> {{ $item->body }} </p>
            </p>
        </div>

        @endforeach
    </div>

    {{ $news->links() }}

@endsection
