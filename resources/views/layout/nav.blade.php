<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="{{ route('main') }}">Главная</a>
        <a class="p-2 text-muted" href="{{ route('news.index') }}">Новости</a>
        <a class="p-2 text-muted" href="{{ route('about') }}">О нас</a>
        <a class="p-2 text-muted" href="{{ route('contacts') }}">Контакты</a>
        <a class="p-2 text-muted" href="{{ route('articles.create') }}">Создать статью</a>
        @admin(auth()->user())
        <a class="p-2 text-muted" href="{{ route('feedback') }}">Админ. раздел</a>
        @endadmin
        @user(auth()->user())
        <a class="p-2 text-muted" href="{{ route('article.management') }}">Управление статьями</a>
        @enduser
    </nav>
</div>
