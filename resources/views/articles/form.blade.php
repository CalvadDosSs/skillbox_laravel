<input type="text" name="slug" id="slug" placeholder="Символьный код страницы" value="{{ old('slug', $article->slug)  }}"> <br>
<input type="text" name="title" placeholder="Название статьи" value="{{ old('title', $article->title) }}"> <br>
<input type="text" name="description" placeholder="Краткое описание статьи" value="{{ old('description', $article->description) }}"> <br>
<textarea name="body" id="body" cols="30" rows="10" placeholder="Текст статьи">{{ old('body', $article->body) }}</textarea> <br>
<lable for="publication">
    <input type="checkbox" name="publication" id="publication"> Опубликовать статью
</lable> <br>

<input type="text" name="tags" id="tags" value="{{ old('tags', $article->tags->pluck('name')->implode(',')) }}">
<br>
