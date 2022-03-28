@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    <div class="tags">
        @foreach($tags as $tag)
            <a class="tags_link" href="{{ route('tags.main', $tag) }}">{{ $tag->name }}</a>
        @endforeach
    </div>
@endif

