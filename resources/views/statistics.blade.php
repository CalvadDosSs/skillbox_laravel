@extends('layout.without_sidebar')

@section('content')

    <h1>Статистика:</h1>

    <p>Количество статей: {{ $countArticles }}</p>
    <p>Количество новостей: {{ $countNews }}</p>
    <p>Автор с наибольшим количеством статей:
        @foreach($author as $item)
            {{ $item->name }}
        @endforeach
    </p>
    <p>Самая длинная статья:
        @foreach($longestArticle as $item)
            <a href="{{ route('articles.show', [$item->slug]) }}">{{ $item->title }}</a>.
            Символов: {{ strlen($item->body) }}
        @endforeach
    </p>
    <p>Самая короткая статья:
        @foreach($shortestArticle as $item)
            <a href="{{ route('articles.show', [$item->slug]) }}">{{ $item->title }}</a>.
            Символов: {{ strlen($item->body) }}
        @endforeach
    </p>
    <p>Среднее количество статей у активных пользователей: {{ $averageCountArticles }}
    </p>
    <p>Самая непостоянная:
        @foreach($changedArticle as $item)
            <a href="{{ route('articles.show', [$item->slug]) }}">{{ $item->title }}</a>.
        @endforeach
    </p>
    <p>Самая обсуждаемая статья:
        @foreach($discussedArticle as $item)
            <a href="{{ route('articles.show', [$item->slug]) }}">{{ $item->title }}</a>.
        @endforeach
    </p>
@endsection
