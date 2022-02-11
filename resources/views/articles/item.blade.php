<div class="article">
    <h2 class="article_title"><a href="{{ route('articles.show', ['article' => $article]) }}">{{ $article->title }}</a></h2>

    <p class="article_description"> Описание: {{ $article->description }}</p>
    <p class="article_body"> {{ $article->body }} </p>
    <p class="article_publication"> Статус: {{
            ($article->publication == 0) ?
            $article->publication = 'Не опубликовано' :
            $article->publication = ' Опубликовано'
        }}
    </p>
</div>
