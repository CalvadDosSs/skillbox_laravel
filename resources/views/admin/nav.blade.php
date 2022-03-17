<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @admin(auth()->user())
        <a class="p-2 text-muted" href="{{ route('admin.management') }}">Управление статьями</a>
        <a class="p-2 text-muted" href="{{ route('news.create') }}">Создать новость</a>
        <a class="p-2 text-muted" href="{{ route('admin.management.news') }}">Управление новостями</a>
        @endadmin
    </nav>
</div>
