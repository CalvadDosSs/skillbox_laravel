<div class="article_wrapper">
    <div class="article">
        <h2 class="article_title"><a href="{{ route('articles.show', ['article' => $article]) }}">{{ $article->title }}</a></h2>

        @include('articles.tags', ['tags' => $article->tags])

        <p class="article_description"> Описание: {{ $article->description }}</p>
        <p class="article_body"> {{ $article->body }} </p>
        <p class="article_publication"> Статус: {{
                ($article->publication == 1 || $article->publication == 'on') ?
                $article->publication = ' Опубликовано' :
                $article->publication = ' Не опубликовано'
            }}
        </p>
    </div>
</div>
