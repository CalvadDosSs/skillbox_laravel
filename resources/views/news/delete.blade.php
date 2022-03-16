<form class="delete" action="{{ route('news.show', ['news' => $news]) }}" method="POST">
    @csrf
    @method('DELETE')

    <input type="submit" value="Удалить" class="delete_news_button">

</form>
