@extends('layout.master')

<style>
    form {
        text-align: center;
    }

    [type='email'],
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

@section('content')

    @include('layout.error')

<form action="{{ route('feedback') }}" method="POST">

    @csrf

    <input type="email" name="email" id="email" placeholder="Email"> <br>
    <textarea name="message" id="message" cols="30" rows="10" placeholder="Ваше сообщение"></textarea> <br>
    <input type="submit" value="Отправить сообщение" name="feedback_button">
</form>

@endsection

