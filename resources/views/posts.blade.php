<x-layout :title="$title">

    @foreach ($posts as $post)  
    <article class="py-8 max-w-3xl border-b border-gray-300">
        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post->title }}</h2>
        </a>
        <div class="text-base text-gray-500">
            By <a href="/authors/{{ $post->author->username }}" class="hover:underline text-red-400">{{ $post->author->name }}</a> | {{ $post->created_at->format('F j, Y')}} | Category : <a href="/categories/{{ $post->category->slug }}" class="hover:underline text-blue-400">{{ $post->category->name }}</a>
        </div>
        <p class="my-4 font-light">{{ Str::limit($post['body'], 100) }}</p>
        <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Baca Selengkapnya &raquo;</a>
    </article>
    @endforeach

</x-layout>