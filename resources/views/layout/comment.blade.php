<hr>

<div class="send_comments">
    <h3>Оставить комментарий:</h3>

    <form action="{{ route('comment', ['article' => $article]) }}" method="POST">

        @csrf

        <textarea class="comment" name="comment" id="comment">{{ old('comment') }}</textarea>
        <input class="comment_button" type="submit" value="Опубликовать">
    </form>

    <h3>Комментарии:</h3>

</div>

@if($article->comments !== null)

    @foreach($article->comments as $comment)
        <div class="comments">
            <p class="comment_email"> Автор: {{ $comment->owner->email }} </p>
            <hr>
            <p class="comment_body"> {{ $comment->comment }} </p>
            <p class="comment_created_at"> {{ $comment->created_at->toFormattedDateString() }} </p>
        </div>
    @endforeach

@endif
