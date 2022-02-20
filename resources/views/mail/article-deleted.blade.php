@component('mail::message')
    # Удалена статья: {{ $article->title }}

    {{ $article->body }}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
