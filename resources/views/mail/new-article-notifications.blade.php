@component('mail::message')
    # Новые статьи:

    @foreach($articles as $article)
        {{ $article->title }}
        @component('mail::button', ['url' => route('articles.show', ['article' => $article])])
            Посмотреть статью
        @endcomponent
    @endforeach

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
