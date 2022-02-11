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

        <input type="text" name="slug" id="slug" placeholder="Символьный код страницы" value="{{ old('slug', $article->slug)  }}"> <br>
        <input type="text" name="title" placeholder="Название статьи" value="{{ old('title', $article->title) }}"> <br>
        <input type="text" name="description" placeholder="Краткое описание статьи" value="{{ old('description', $article->description) }}"> <br>
        <textarea name="body" id="body" cols="30" rows="10" placeholder="Текст статьи">{{ old('body', $article->body) }}</textarea> <br>
        <lable for="publication">
            <input type="checkbox" name="publication" id="publication"> Опубликовать статью
        </lable> <br>

        <input class="change_article_button" type="submit" value="Изменить" name="change_article_button">
    </form>

    @include('articles.delete')

@endsection
