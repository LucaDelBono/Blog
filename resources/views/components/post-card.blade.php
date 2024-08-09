@props(['post'])
<div>
    <a href="{{ route('post.show', $post->id) }}">
        <div>
            <img class="w-full rounded-xl" src="{{ $post->getImageUrl() }}">
        </div>
    </a>
    <div class="mt-3">
        <a href="{{ route('post.show', $post->id) }}">
        </a>
        <div class="flex items-center mb-2">
            <div class="flex items-center mb-2">
                
                @if(isset($post->category))
                <a href="" class="bg-gray-600 
                    text-white 
                    rounded-xl px-3 py-1 text-sm mr-3">
                    {{$post->category->name}}
                </a>
                @endif
                <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
            </div>            
        </div>
        <a href="{{ route('post.show', $post->id) }}">
            <h3 class="text-xl font-bold text-gray-900">{{ $post->title }}</h3>
        </a>
    </div>
</div>
