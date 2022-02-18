@extends('layout.master')

<style>
    .contact_form {
        text-align: center;
    }

    [type='email'],
    .feedback_button,
    textarea {
        width: 500px;
        margin: 10px 0;
        padding: 10px;
        border: 2px black solid;
        border-radius: 10px;
        font-size: 16px;
    }

    .contact_form .feedback_button {
        background-color: green;
        color: white;
        font-size: 18px;
    }
</style>

@section('content')

    @include('layout.error')

<form class="contact_form" action="{{ route('feedback') }}" method="POST">

    @csrf

    <input type="email" name="email" id="email" placeholder="Email"> <br>
    <textarea name="message" id="message" cols="30" rows="10" placeholder="Ваше сообщение"></textarea> <br>
    <input class="feedback_button" type="submit" value="Отправить сообщение" name="feedback_button">
</form>

@endsection

