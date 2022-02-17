<form class="delete" action="{{ route('articles.show', ['article' => $article]) }}" method="POST">
    @csrf
    @method('DELETE')

    <input type="submit" value="Удалить" class="delete_button">

</form>
