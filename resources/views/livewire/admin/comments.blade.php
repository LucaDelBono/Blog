<div>
    @include('layout.navbar')
    @include('admin.include.side-bar')

    <div class="p-4 sm:ml-64">
        <div class="mt-3">
            @include('components.successMessage')

            <div class="max-w-md mb-4">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" wire:model.live.debounce.300ms="search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border rounded-lg bg-white focus:ring-yellow-500 focus:border-yellow-500 border-gray-600 placeholder-gray-500"
                        placeholder="Cerca commenti da moderare..." required />
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-yellow-500">
                        <tr>
                            <th class="px-6 py-3">
                                Utente
                            </th>
                            <th class="px-6 py-3">
                                Commento
                            </th>
                            <th class="px-6 py-3">
                                Post
                            </th>
                            <th class="px-6 py-3">
                                Data Creazione
                            </th>
                            <th class="px-6 py-3">
                                #
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr wire:key="{{$comment->id}}" class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700">
                                <td class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                    {{ $comment->user->nickname }}
                                </td>
                                <td class="px-6 py-4 text-white">
                                    {{ $comment->content }}
                                </td>
                                <td class="px-6 py-4 text-white hover:underline">
                                    <a
                                        href="{{ route('post.show', $comment->post_id) }}">{{ $comment->post->title }}</a>
                                </td>
                                <td class="px-6 py-4 text-white">
                                    {{ $comment->created_at }}
                                </td>

                                <td x-data class="px-6 py-4 text-white">

                                    <button x-on:click="$dispatch('open-modal' , {name : 'commento{{$comment->id}}'})" type="button"
                                        class="mt-2 font-medium text-yellow-500 hover:underline">
                                        Elimina
                                    </button>
                                    <x-modal name="commento{{$comment->id}}" title="Eliminare commento?">
                                        @slot('body')
                                                <button wire:click="delete({{$comment->id}})"
                                                    class="text-black bg-green-500 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-primary-800 font-medium rounded text-sm px-5 py-2 text-center hover:bg-green-800">Conferma</button>
                                        @endslot
                                    </x-modal>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">{{ $comments->links() }}</div>
            </div>
        </div>
    </div>
    @include('layout.footer')
</div>
