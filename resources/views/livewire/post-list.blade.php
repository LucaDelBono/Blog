<div>
    <div class="flex justify-between items-center border-b border-gray-100">
        <div id="filter-selector" class="flex items-center space-x-4 font-light ">
            <button wire:click="setSort('desc')"
                class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4">Novità</button>
            <button wire:click="setSort('asc')"
                class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4">Datato</button>
        </div>
    </div>
    @if ($this->category)
    <div class="py-5">
        <a href="{{ route('blog', ['category' => $category]) }}"
            class="bg-gray-600 
                    text-white
                    rounded-xl px-4 py-1 text-base">
            {{ $this->category }}</a>
    </div>
    @elseif ($this->search)
    <div class="py-5">
        <a href=""
            class="bg-gray-600 
                    text-white 
                    rounded-xl px-4 py-1 text-base">{{ $this->search }}</a>
    </div>
    @endif

    @foreach ($posts as $post)
        <div class="py-3">
            <article class="[&:not(:last-child)]:border-b border-gray-100 pb-5">
                <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
                    <div class="article-thumbnail col-span-5 flex items-center">
                        <a href="{{ route('post.show', $post->id) }}">
                            <img class="mw-100 mx-auto rounded-xl" src={{ $post->getImageUrl() }} alt="thumbnail">
                        </a>
                    </div>
                    <div class="col-span-7">
                        <div class="article-meta flex py-1 text-sm items-center">
                            <img class="w-7 h-7 rounded-full mr-3" src={{ $post->user->getImageUrl() }} alt="avatar">
                            <span class="mr-1 text-xs">{{ $post->user->nickname }}</span>
                            <span class="text-gray-500 text-xs">. {{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">
                            <a href="{{ route('post.show', $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <p class="mt-2 text-base text-gray-700 font-light">
                            {{ Str::limit($post->content, 45) }}
                        </p>
                        <div class="article-actions-bar mt-6 flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                            </div>
                            <div>
                                <a class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-6 h-6 text-gray-600 hover:text-gray-900 {{ Auth::user()?->likesPost($post) ? 'fill-yellow-500' : 'fill-none' }}">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                    <span class="text-gray-600 ml-2">
                                        {{ $post->likes->count() }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    @endforeach
    <div class="my-3">{{ $posts->links() }}</div>
</div>
