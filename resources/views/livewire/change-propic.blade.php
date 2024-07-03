<div>
    <div class="grid max-w-2xl mx-auto mt-8">
        <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0">
            @if (!$image)
                <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-yellow-500"
                    src="{{ $user->getImageUrl() }}" alt="Bordered avatar">
            @else
                <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-yellow-500"
                    src="{{ $image->temporaryUrl() }}" alt="Bordered avatar">
            @endif
            <div wire:submit="update({{$user->id}})" class="flex flex-col space-y-5 sm:ml-8">
                <form enctype="multipart/form-data">
                    <input wire:model="image" type="file" id="actual-btn" class="hidden">
                    </input>
                    @if (!$image)
                        <label for="actual-btn"
                            class="py-3.5 px-7 text-base font-medium text-white focus:outline-none bg-gray-700 rounded-lg border hover:bg-gray-800 focus:z-10 focus:ring-4 focus:ring-gray-200 ">
                            Cambia foto profilo
                        </label>
                    @endif
                    @if ($image)
                        <button
                            class="py-3.5 px-4 ml-3 text-gray bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-gray-600 font-medium rounded-lg text-sm w-full sm:w-auto text-center">
                            Annulla
                        </button>
                        <button type="submit"
                            class="py-3.5 px-6 ml-3 text-gray bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-gray-600 font-medium rounded-lg text-sm w-full sm:w-auto text-center">
                            Salva
                        </button>
                    @endif
                    @error('image')
                        <span>{{ $message }}</span>
                    @enderror

                </form>
                @if (isset($user->image))
                    <form wire:submit="delete({{$user->id}})">
                        @if (!$image)
                            <button type="submit"
                                class="py-3.5 px-7 text-base font-medium text-gray-900 focus:outline-none bg-gray-100 rounded-lg border border-gray-200 focus:z-10 focus:ring-4 focus:ring-gray-400">
                                Elimina foto profilo
                            </button>
                        @endif
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
