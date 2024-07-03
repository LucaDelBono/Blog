<form action="{{ route('userSettings.update', $user->id) }}" method="post"
    class="mb-7">
    @csrf
    @method('put')
    <div
        class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
        <div class="w-full">
            <label for="name"
                class="block mb-2 text-sm font-medium text-gray">Nome</label>
            <input type="text" name="name"
                class="bg-yellow-100 border border-gray-600 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                placeholder="Inserire nome" value="{{ $user->name }}" required>
        </div>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        <div class="w-full">
            <label for="surname"
                class="block mb-2 text-sm font-medium text-gray">Cognome
            </label>
            <input type="text" name="surname"
                class="bg-yellow-100 border border-gray-600 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                placeholder="Inserire cognome" value="{{ $user->surname }}" required>
        </div>
        @error('surname')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-2 sm:mb-6">
        <label for="nickname"
            class="block mb-2 text-sm font-medium text-gray">Nickname
        </label>
        <input type="text" name="nickname"
            class="bg-yellow-100 border border-gray-600 text-gray-900 text-sm rounded-lg block w-full p-2.5"
            placeholder="Inserire nickname" value="{{ $user->nickname }}" required>
    </div>
    @error('nickname')
        <span>{{ $message }}</span>
    @enderror
    <div class="mb-2 sm:mb-6">
        <label for="email"
            class="block mb-2 text-sm font-medium text-gray">Email</label>
        <input type="email" name="email"
            class="bg-yellow-100 border border-gray-600 text-gray-900 text-sm rounded-lg block w-full p-2.5"
            placeholder="Inserire email" value="{{ $user->email }}" required>
    </div>
    @error('email')
        <span>{{ $message }}</span>
    @enderror
    <div class="mb-6">
        <label for="about"
            class="block mb-2 text-sm font-medium text-gray">Descrizione</label>
        <textarea rows="4" name="about"
            class="block p-2.5 w-full text-sm text-gray-900 bg-yellow-100 rounded-lg border border-gray-600"
            placeholder="Scrivi qualcosa su di te...">{{ $user->about }}</textarea>
    </div>
    @error('about')
        <span>{{ $message }}</span>
    @enderror
    <div class="flex justify-end">
        <button type="submit"
            class="text-gray bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-gray-600 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Salva</button>
    </div>
</form>