@csrf

<input type="text" class="create_news_slug" name="slug" id="slug" placeholder="Символьный код новости" value="{{ old('slug', $news->slug)  }}"> <br>
<input type="text" class="create_news_title" name="title" placeholder="Заголовок новости" value="{{ old('title', $news->title) }}"> <br>
<textarea class="create_news_body" name="body" id="news_body" cols="30" rows="10">
            {{ old('news_body', $news->body) }}
        </textarea> <br>
<lable for="publication">
    <input type="checkbox" class="create_publication_news" name="news" id="publication_news"> Опубликовать новость
</lable> <br>
