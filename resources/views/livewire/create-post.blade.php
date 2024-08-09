<div>
    @include('layout.navbar')
    @include('components.successMessage')
    <main class="container mx-auto px-5 flex flex-grow">
        <article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px">
            <img class="w-full my-2 rounded-lg" src="" alt="">
            <h1 class="text-4xl font-bold text-left text-gray-800">
                Crea un nuovo Post!
            </h1>


            <form wire:submit="store" enctype="multipart/form-data" class="mt-10">
                <label for="title"></label>
                <div class="mb-10">
                    <textarea wire:model="title"
                        class="w-full rounded-lg p-4 bg-yellow-100 focus:outline-none text-sm text-gray-700 border border-gray-600 placeholder:text-gray-400"
                        cols="30" rows="1" placeholder="Titolo"></textarea>
                    @error('title')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-7">
                    <label for="content"></label>
                    <textarea wire:model="content"
                        class="w-full rounded-lg p-4 bg-yellow-100 focus:outline-none text-sm text-gray-700 border border-gray-600 placeholder:text-gray-400"
                        cols="30" rows="7" placeholder="Contenuto"></textarea>
                    @error('content')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5 mt-2">
                    <label for="image" class="mr-10 mt-5">Scegli una thumbnail</label>
                    <input wire:model="image" type="file" accept="image/png, image/jpeg" class="form-control">
                    @error('image')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    @if ($image)
                            <img class="rounded w-15 h-15 mt-5 block" src="{{ $image->temporaryUrl() }}">
                    @endif
                    <div wire:loading wire:target="image">
                        <span class="text-green-500">Uploading...</span>
                    </div>
                </div>
                
                <br>

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
                <select wire:model="category_id"
                    class="bg-gray-90 mt-5 border border-gray-600 text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-gray-400 ">
                    <option value="">Seleziona categoria</option>
                    @foreach ($categories as $category)
                        <option wire:key="{{ $category->id }}" value="{{ $category->id }}">{{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <button
                    class="mt-7 text-gray bg-indigo-700  hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-indigo-800"
                    type="reset">Ripristina</button>
                <button
                    class="ml-5 text-gray bg-indigo-700  hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-indigo-800"
                    type="submit">Pubblica</button>
            </form>
        </article>
    </main>
    @include('layout.footer')
</div>
