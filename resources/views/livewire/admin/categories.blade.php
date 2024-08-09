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
                        placeholder="Cerca categorie..." required />
                </div>
            </div>

            <button x-on:click="$dispatch('open-modal', {name : 'add'})" type="button"
                class="focus:outline-none text-white bg-gray-900 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                Crea categoria
            </button>
            <x-admin.form-modal name="add" title="Aggiungi categoria">
                @slot('body')
                    <form wire:submit="store">
                        <div class="mb-3">
                            <input wire:model="name" type="text" placeholder="Inserire nome"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit"
                            class="text-black bg-green-500 hover:bg-green-400 font-bold rounded px-4 py-2">
                            Conferma
                        </button>
                        <button x-on:click="$dispatch('close-modal')" type="button"
                            class="bg-red-500 hover:bg-red-400 px-4 py-2 black rounded font-bold">Annulla</button>
                    </form>
                @endslot
            </x-admin.form-modal>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-yellow-500">
                        <tr>
                            <th class="px-6 py-3">
                                Nome
                            </th>
                            <th class="px-6 py-3">
                                Data Creazione
                            </th>
                            <th class="px-6 py-3">
                                Azioni
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr wire:key="{{$category->id}}" class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700">
                            <td class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                {{$category->name}}
                            </td>
                            <td class="px-6 py-4 text-white">
                                {{$category->created_at}}
                            </td>
                            <td x-data class="px-6 py-4 text-white">
                                <!--delete-->
                                <button x-on:click="$dispatch('open-modal' , {name : 'delete{{$category->id}}'})" type="button"
                                    class="mt-2 mr-8 font-medium text-yellow-500 hover:underline">
                                    Elimina
                                </button>
                                <x-modal name="delete{{$category->id}}" title="Eliminare categoria?">
                                    @slot('body')
                                        <button wire:click="delete({{$category->id}})"
                                            class="text-black bg-green-500 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-primary-800 font-bold rounded text-sm px-5 py-2 text-center hover:bg-green-800">
                                            Conferma
                                        </button>
                                    @endslot
                                </x-modal>
                                <!--update-->
                                <button x-on:click="$dispatch('open-modal' , {name : 'update{{$category->id}}'})" type="button"
                                    class="mt-2 font-medium text-yellow-500 hover:underline">
                                    Modifica
                                </button>
                                <x-admin.form-modal name="update{{$category->id}}" title="Aggiorna categoria">
                                    @slot('body')
                                        <form wire:submit="update({{$category->id}})">
                                            <div class="mb-3">
                                                <input wire:model="newName" type="text" placeholder="Inserire nuovo nome" 
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                                @error('newName')
                                                    <div class="text-red-500">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit"
                                                class="text-black bg-green-500 hover:bg-green-400 font-bold rounded px-4 py-2">
                                                Conferma
                                            </button>
                                            <button x-on:click="$dispatch('close-modal')" type="button"
                                                class="bg-red-500 hover:bg-red-400 px-4 py-2 text-black rounded font-bold">Annulla</button>
                                        </form>
                                    @endslot
                                </x-admin.form-modal>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">{{$categories->links()}}</div>
            </div>
        </div>
    </div>
    @include('layout.footer')
</div>
