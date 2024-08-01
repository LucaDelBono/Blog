@props(['post'])
<div>
        <a href="{{ route('post.show', $post->id) }}">
            <div>
                <img class="w-full rounded-xl" src="{{ $post->getImageUrl() }}">
            </div>
        </a>
        <div class="mt-3"><a href="{{ route('post.show', $post->id) }}">
            </a>
            <div class="flex items-center mb-2"><a href="http://127.0.0.1:8000/blog/laravel-34">
                </a>
                <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
            </div>
            <a href="{{ route('post.show', $post->id) }}">
                <h3 class="text-xl font-bold text-gray-900">{{ $post->title }}</h3>
            </a>
        </div>
</div>