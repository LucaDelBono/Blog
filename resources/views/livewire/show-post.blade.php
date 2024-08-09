@section('title', $post->title . ' | ')
<div>
    @include('layout.navbar')
    @include('components.successMessage')

    <main class="container mx-auto px-5 flex flex-grow">
        <article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px">
            <img class="w-full my-2 rounded-lg" src="" alt="">
            <h1 class="text-4xl font-bold text-left text-gray-800">
                {{ $post->title }}
            </h1>
            <div class="mt-2 flex justify-between items-center">
                <div class="flex py-5 text-base items-center">
                    <img class="w-10 h-10 rounded-full mr-3" src="{{ $post->user->getImageUrl() }}" alt="avatar">
                    <span class="mr-1"><a
                            href="{{ route('users.show', $post->user->id) }}">{{ $post->user->nickname }}</a></span>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-500 mr-2">{{ $post->created_at->diffForHumans() }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                        stroke="currentColor" class="w-5 h-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <div
                class="article-actions-bar my-6 flex text-sm items-center justify-between border-t border-b border-gray-100 py-4 px-2">
                <livewire:like-button :post="$post" />
                @auth
                    @can('update', $post)
                        <div>
                            <div class="flex items-center">
                                <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2"
                                    wire:navigate href="{{ route('post.edit', $post->id) }}">Modifica</a>
                                <button x-data x-on:click="$dispatch('open-modal' , { name : 'post' })"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                    Elimina
                                </button>
                                <x-modal name="post" title="Eliminare definitivamente il post?">
                                    @slot('body')
                                        <button wire:click="delete({{ $post->id }})"
                                            class="bg-green-500 hover:bg-green-400 text-gray-800 font-bold py-2 px-4 rounded">
                                            Conferma
                                        </button>
                                    @endslot
                                </x-modal>
                            </div>

                        </div>
                    @endcan
                @endauth
            </div>


            <div class="article-content py-3 text-gray-800 text-lg text-justify">
                {{ $post->content }}
            </div>

            @if(isset($post->category))
            <div class="flex items-center space-x-4 mt-10">
                <a href="#" class="bg-gray-600 text-white rounded-xl px-3 py-1 text-base">
                    {{$post->category->name}}</a>
            </div>
            @endif

            <livewire:comment :post="$post" />

        </article>
    </main>
    @include('layout.footer')
</div>
