@section('title', $post->title.' | ')
<div>
    @include('layout.navbar')
    @include('include.successMessage')
    
    <main class="container mx-auto px-5 flex flex-grow">
        <article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px">
            <img class="w-full my-2 rounded-lg" src="" alt="">
            <h1 class="text-4xl font-bold text-left text-gray-800">
                @if ($editing ?? false)
                    Modifica post
                @else
                    {{ $post->title }}
                @endif
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
                                @if ($editing ?? false)
                                    <button wire:click="cancelEdit"
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                                        Indietro
                                    </button>
                                    </form>
                                @else
                                    <button wire:click="edit({{ $post->id }})"
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                                        Modifica
                                    </button>
                                    <button wire:click="delete({{ $post->id }})"
                                        onclick="confirm('Vuoi eliminare definitivamente questo post?') || event.stopImmediatePropagation()"
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                                        Elimina
                                    </button>
                                @endif
                            </div>

                        </div>
                    @endcan
                @endauth
            </div>

            @if ($editing ?? false)
                <form wire:submit="update({{ $post->id }})" enctype="multipart/form-data">
                    <div class="mb-5">
                        <label for="title"></label>
                        <textarea wire:model="title"
                            class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400 mb-5"
                            cols="30" rows="1">{{ $post->title }}</textarea>
                        @error('title')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-10">
                        <label for="content"></label>
                        <textarea wire:model="content"
                            class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400"
                            cols="30" rows="7">{{ $post->content }}</textarea>
                        @error('content')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="image" class="mr-10 mt-5">Scegli una thumbnail</label>
                        <input wire:model="image" type="file" accept="image/png, image/jpeg" class="form-control"
                            value="{{ $post->getImageUrl() }}">
                        @error('image')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        @if ($image)
                            <img class="rounded w-15 h-15 mt-5 block" src="{{ $image->temporaryUrl() }}">
                        @endif
                    </div>
                    <div wire:loading wire:target="image">
                        <span class="text-green-500">Uploading...</span>
                    </div>
                   
                    <button
                        class="text-gray bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                        type="submit"
                        onclick="confirm('Vuoi salvare le modifiche?') || event.stopImmediatePropagation()"
                        >
                        Salva modifiche
                    </button>
                </form>
            @else
                <div class="article-content py-3 text-gray-800 text-lg text-justify">
                    {{ $post->content }}
                </div>
            @endif

            @if ($editing ?? false)
            @else
                <livewire:comment :post="$post" />
            @endif

        </article>
    </main>
    @include('layout.footer')
</div>
