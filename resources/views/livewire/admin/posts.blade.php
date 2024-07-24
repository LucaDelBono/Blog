<div>
    @include('layout.navbar')
    @include('admin.include.side-bar')

    <div class="p-4 sm:ml-64">
        <div class="mt-3">
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
                        placeholder="Cerca post..." required />
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                    <thead class="text-xs uppercase bg-yellow-500 text-gray-700">
                        <tr>
                            <th class="px-6 py-3">
                                Titolo
                            </th>
                            <th class="px-6 py-3">
                                Contenuto
                            </th>
                            <th class="px-6 py-3">
                                Autore
                            </th>
                            <th class="px-6 py-3">
                                Data creazione
                            </th>
                            <th class="px-6 py-3">
                                #
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr wire:key="{{$post->id}}" class="odd:bg-gray-900  even:bg-gray-800 border-b border-gray-700">
                                <td class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                    {{ $post->title }}
                                </td>
                                <td class="px-6 py-4 text-white">
                                    {{ Str::limit($post->content, 50) }}
                                </td>
                                <td class="px-6 py-4 text-white">
                                    {{ $post->user->nickname }}
                                </td>
                                <td class="px-6 py-4 text-white">
                                    {{ $post->created_at->toDateString() }}
                                </td>
                                <td class="px-6 py-4 text-white">
                                    <a href="{{ route('post.show', $post->id) }}"
                                        class="font-medium text-yellow-500 hover:underline">Visualizza</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
</div>
