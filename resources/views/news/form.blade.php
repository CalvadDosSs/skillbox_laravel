@csrf

<input type="text" class="create_slug" name="slug" id="slug" placeholder="Символьный код новости" value="{{ old('slug', $news->slug)  }}"> <br>
<input type="text" class="create_title" name="title" placeholder="Заголовок новости" value="{{ old('title', $news->title) }}"> <br>
<textarea class="create_body" name="body" id="news_body" cols="30" rows="10">
    {{ old('news_body', $news->body) }}
</textarea> <br>
<input type="text" class="create_tags" name="tags" id="tags" placeholder="Теги" value="{{ old('tags', $news->tags->pluck('name')->implode(',')) }}">
<br>
<lable for="publication">
    <input type="checkbox" class="create_publication" name="publication" id="publication_news"> Опубликовать новость
</lable> <br>
