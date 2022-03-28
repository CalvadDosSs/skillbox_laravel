@extends('layout.master')

@section('content')

    @include('layout.success')

    <div class="article">
        <h1> {{ $item->title }} </h1>

        @can('update', $item)
            <a class="change" href="{{ route('articles.edit', [$item]) }}">Изменить</a>
        @endcan

        @include('articles.tags', ['tags' => $item->tags])
        <hr>
        <p class="article_description"> {{ $item->description }} </p>
        <hr>
        <p class="article_body"> {{ $item->body }} </p>
    </div>

    <div class="back">
        <a href="{{ route('main') }}"><-- Вернуться на главную</a>
    </div>

    @admin(auth()->user())

    <div class="changes">

    <hr>

    <h3>Изменения статьи:</h3>

        @forelse($item->history as $history)
            <p><span>Автор изменения:</span> {{ $history->email }} </p>
            <p><span>Измененено:</span> {{ $history->pivot->created_at->diffForHumans() }} </p>
            <p><span>Было:</span> {{ Arr::query($history->pivot->before) }} </p>
            <p><span>Стало:</span> {{ Arr::query($history->pivot->after) }} </p>
        @empty
            <p>Изменений не было</p>
        @endforelse

    </div>

    @endadmin

    @include('layout.comment')
@endsection
