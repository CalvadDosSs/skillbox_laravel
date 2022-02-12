@php
    $tags = $tags ?? collect();
@endphp

<style>

    .tags_link {
        text-decoration: none;
        padding: 5px 10px;
        background-color: lightskyblue;
        border-radius: 12px;
        color: darkblue;
    }
</style>

@if($tags->isNotEmpty())
    <div class="tags">
        @foreach($tags as $tag)
            <a class="tags_link" href="{{ route('tags.main', $tag) }}">{{ $tag->name }}</a>
        @endforeach
    </div>
@endif

