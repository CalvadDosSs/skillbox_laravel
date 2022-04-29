@extends('layout.without_sidebar')

@section('content')

    @include('layout.error')

<form class="create" action="{{ route('news.store') }}" method="POST">

    @include('news.form')

    <input class="create_button" type="submit" value="Создать" name="create_button">
</form>


@endsection
