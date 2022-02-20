@component('mail::message')
# Статья {{ $article->title }} была изменена

{{ $article->body }}

@component('mail::button', ['url' => route('articles.show', ['article' => $article])])
    Посмотреть статью
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
