@props(['posts'])

<x-post-featured-card :posts="$posts[0]" />

@if($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-3 gap-6">
        @foreach ($posts->skip(1) as $post)  {{-- Use singular variable --}}
            <x-post-card :posts="$post" />
        @endforeach
    </div>
@endif
