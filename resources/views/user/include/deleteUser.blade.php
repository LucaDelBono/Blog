@extends('layout.appLayout')
@section('content')
    @include('layout.navbar')
    <section class="bg-white">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto mt-20 lg:py-0">
            <div href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                Elimina account
            </div>

            <div class="w-full bg-yellow-200 rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0 border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray md:text-2xl">
                        Inserire Password
                    </h1>

                    <form class="space-y-4 md:space-y-6" action="{{ route('userSettingsDelete.destroy', $user->id) }}"
                        method="post">
                        @csrf
                        @method('delete')
                        <input type="password" name="password" id="password" placeholder="••••••••" required
                            class="bg-white border border-gray-600 text-black sm:text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 placeholder-gray-400 ">
                        @error('password')
                            <div class="text-gray-900">{{ $message }}</div>
                        @enderror
                        <button type="submit"
                            class="text-white bg-gray-700 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-primary-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-primary-800"
                            onclick="confirm('{{ Auth::user()->nickname }} vuoi eliminare definitivamente il tuo account?') || event.stopImmediatePropagation()">
                            Conferma
                        </button>

                        <button
                            class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-primary-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-primary-800">
                            <a href="{{ route('userSettings.index') }}">Annulla</a>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </section>
    @include('layout.footer')
@endsection
