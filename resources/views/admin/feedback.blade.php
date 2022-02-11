@extends('layout.master')

@section('content')

    <style>

        .contact_title {
            text-align: center;
        }

        .contacts {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px 20px 5px 20px;
            background-color: lightgray;
            border-radius: 10px;
            border: 0 solid lightgray;
        }

        .contacts p {
            font-size: 16px;
        }

        .contact_email {
            font-weight: bold;
        }

        .contact_created_at {
            font-size: 12px !important;
            color: darkcyan;
            font-style: italic;
        }
    </style>

    <h2 class="contact_title"></h2>

    @foreach($contacts as $contact)
        @include('admin.item')
    @endforeach

@endsection
