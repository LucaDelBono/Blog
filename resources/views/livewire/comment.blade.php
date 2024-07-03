<div>
    <div class="mt-10">
        <section class="bg-white py-8 lg:py-16 antialiased border border-yellow-500 rounded-lg">
            <div class="max-w-2xl mx-auto px-4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Commenti
                        ({{ $post->comment->count() }})</h2>
                </div>
                @auth
                    <form wire:submit="store" class="mb-6">
                        <div
                            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-700 ">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea wire:model="content" id="comment" rows="6"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none "
                                placeholder="Scrivi cosa ne pensi..." required></textarea>
                        </div>

                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-yellow-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Pubblica commento
                        </button>
                    </form>
                @endauth
                @foreach ($post->comment as $comment)
                    <article  class="p-6 text-base bg-white rounded-lg">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 text-sm text-gray-900"><img
                                        class="mr-2 w-6 h-6 rounded-full" src="{{ $comment->user->getImageUrl() }}">
                                    {{ $comment->user->nickname }}
                                </p>
                                <p class="text-sm text-gray-400">
                                    {{ $comment->created_at->diffForHumans() }}
                                </p>
                            </div>
                            @can('update', $comment)
                                <button id="dropdownCommentButton" data-dropdown-toggle="dropdownComment-{{ $comment->id }}"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-gray-900 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 16 3">
                                        <path
                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                    </svg>
                                    <span class="sr-only">Comment settings</span>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownComment-{{ $comment->id }}"
                                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-200"
                                        aria-labelledby="dropdownMenuIconHorizontalButto">
                                        <li>
                                            <button wire:click="edit({{ $comment->id }})" id="updateBtn"
                                                class="block py-2 px-4 text-left w-full hover:bg-gray-600 hover:text-white">
                                                Modifica
                                            </button>
                                        </li>

                                        <li>
                                            <button wire:click="delete({{ $comment->id }})" id="deleteBtn"
                                                class="block py-2 px-4 text-left w-full hover:bg-gray-100 hover:bg-gray-600 hover:text-white"
                                                onclick="confirm('Vuoi eliminare definitivamente il commento?') || event.stopImmediatePropagation()">
                                                Elimina
                                            </button>
                                        </li>

                                    </ul>
                                </div>
                            @endcan

                        </footer>
                        @if ($editCommentId === $comment->id)
                            <textarea wire:model="editCommentContent" rows="6"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none placeholder-gray-400"
                                required>{{ $comment->content }}</textarea>
                            <button wire:click="update({{ $comment->id }})"
                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-yellow-700 rounded-lg focus:ring-4 focus:ring-primary-900 hover:bg-primary-800">
                                Salva
                            </button>
                            <button wire:click="cancelEdit"
                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-yellow-700 rounded-lg focus:ring-4 focus:ring-primary-900 hover:bg-primary-800">
                                Annulla
                            </button>
                        @else
                            <p class="text-gray-500">
                                {{ $comment->content }}
                            </p>
                        @endif

                        <div class="flex items-center mt-4 space-x-4">

                        </div>
                    </article>

                    <div class="border-t border-gray-300"></div>
                @endforeach
            </div>
        </section>
    </div>
</div>
