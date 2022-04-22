<x-main>
    <div class="max-w-6xl mx-auto mt-12">
        <h1>{{ $post->title }}</h1>
        {{ $post->getFirstMedia('downloads') }}
    </div>
</x-main>
