<div>
    @section('title', $post->title . ' | ')
    <div>
        @include('layout.navbar')
        @include('components.successMessage')

        <main class="container mx-auto px-5 flex flex-grow">
            <article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px">
                <img class="w-full my-2 rounded-lg" src="" alt="">
                <h1 class="text-4xl font-bold text-left text-gray-800">
                    Modifica post
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
                                    <a wire:navigate href="{{ route('post.show', $post->id) }}"
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                                        Indietro
                                    </a>
                                </div>

                            </div>
                        @endcan
                    @endauth
                </div>

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

                    <select wire:model="user_id"
                        class="bg-gray-90 border border-gray-600 text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-gray-400 ">
                        <option value="">Autore post</option>
                        @foreach ($users as $user)
                            <option wire:key="{{ $user->id }}" value="{{ $user->id }}">{{ $user->nickname }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <select wire:model="category"
                        class="bg-gray-90 mt-5 border border-gray-600 text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-gray-400" required>
                        <option value="">Seleziona categoria</option>
                        @foreach ($categories as $category)
                            <option wire:key="{{ $category->id }}" value="{{ $category->name }}">{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror

                    <button x-data x-on:click="$dispatch('open-modal' , { name : 'modificaPost'})" type="button"
                        class="mt-5 text-gray bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                        Salva modifiche
                    </button>
                    <x-modal name="modificaPost" title="Confermare modifiche?">
                        @slot('body')
                            <button type="submit"
                                class="text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-primary-800 font-medium rounded text-sm px-5 py-2.5 text-center hover:bg-primary-800">
                                Conferma
                            </button>
                        @endslot
                    </x-modal>
                </form>
            </article>
        </main>
        @include('layout.footer')
    </div>
</div>
