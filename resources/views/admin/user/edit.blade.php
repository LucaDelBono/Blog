@extends('layout.appLayout')
@include('layout.navbar')
@include('admin.include.side-bar')

<div class="p-4 sm:ml-64">
    <div class="mt-3">
        <h1 class="text-2xl md:text-3xl font-bold lg:text-5xl text-gray-700">
            Modifica Utente
        </h1>
        <form action="{{ route('admin.userUpdate', $user->id) }}" method="post">
            @method('put')
            @csrf
            <div>
                <label for="nickname" class="mt-5 block mb-2 text-sm font-medium text-gray-900">Nickname</label>
                <input type="text" name="nickname" id="nickname" value="{{ $user->nickname }}"
                    class="bg-white border border-gray-600 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-2/4 p-2.5 placeholder-gray-400">
            </div>
            <div x-data>
                <label for="role" class="mt-5 block mb-2 text-sm font-medium text-gray-900">Ruolo</label>
                <select name="role" id="role"
                    class="bg-white border border-gray-600 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-2/4 p-2.5 placeholder-gray-400">
                    <option selected></option>
                    <option value="Redattore" {{ $user->role === 'Redattore' ? 'Selected' : '' }}>Redattore</option>
                    <option value="Autore" {{ $user->role === 'Autore' ? 'Selected' : '' }}>Autore</option>
                    <option value="Utente" {{ $user->role === 'Utente' ? 'Selected' : '' }}>Utente</option>
                </select>
                @error('role')
                    <div class="mt-1 text-red-500">{{ $message }}</div>
                @enderror
                <button x-on:click="$dispatch('open-modal', { name : 'edit'})"
                    class="mt-5 py-2 px-4 rounded bg-yellow-500 hover:bg-yellow-600 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"
                    type="button">
                    Aggiorna</button>
                <x-modal name="edit" title="Confermare le modifiche?">
                    @slot('body')
                    <button type="submit"
                        class="text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-primary-800 font-medium rounded text-sm px-5 py-2.5 text-center hover:bg-primary-800">
                        Conferma
                    </button>
                    @endslot
                </x-modal>
            </div>
        </form>
    </div>
</div>
@include('layout.footer')
