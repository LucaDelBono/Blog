<form action="{{ route('password.update', $user->id) }}" method="post" class="mt-3">
    @csrf
    @method('put')
    <div class="mb-2 sm:mb-6">
        <label for="password"
            class="block mb-2 text-sm font-medium text-gray">Password
            attuale</label>
        <input type="password" name="password"
            class="bg-yellow-100 border border-gray-600 text-gray-900 text-sm rounded-lg block w-full p-2.5  "
            placeholder="******" required>
    </div>
    @error('password')
        <span>{{ $message }}</span>
    @enderror
    <div class="mb-2 sm:mb-6">
        <label for="newPassword"
            class="block mb-2 text-sm font-medium text-gray">Nuova
            password</label>
        <input type="password" name="newPassword"
            class="bg-yellow-100 border border-gray-600 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
            placeholder="******" required>
    </div>
    @error('newPassword')
        <span>{{ $message }}</span>
    @enderror
    <div class="mb-2 sm:mb-6">
        <label for="password_confirmation"
            class="block mb-2 text-sm font-medium text-gray">Conferma
            nuova password</label>
        <input type="password" name="password_confirmation"
            class="bg-yellow-100 border border-gray-600 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
            placeholder="******" required>
    </div>
    @error('password_confirmation')
        <span>{{ $message }}</span>
    @enderror
    <div class="flex justify-end">
        <button type="submit"
            class="text-gray bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-gray-600 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mb-5">Salva</button>
    </div>
</form>