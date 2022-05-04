@extends('layout.without_sidebar')

@section('content')

    <h1>Отправить отчет</h1>

    <form action="{{ route('total.count') }}" method="POST">

        @csrf

        <input type="checkbox" name="articles" class="total_checkbox"> Статьи <br>
        <input type="checkbox" name="news" class="total_checkbox"> Новости <br>
        <input type="checkbox" name="tags" class="total_checkbox"> Теги <br>
        <input type="checkbox" name="users" class="total_checkbox"> Пользователи <br>
        <input type="checkbox" name="comments" class="total_checkbox"> Комментарии <br>
        <input type="submit" name="send_total_btn" value="Отправить отчет" class="send_total_btn">
    </form>

@endsection
