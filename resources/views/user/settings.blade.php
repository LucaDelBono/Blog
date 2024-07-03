@extends('layout.appLayout')
@section('content')
    @include('layout.navbar')
    @include('include.successMessage')
    <div class="mt-10">

        <div class="flex items-center justify-center">
            <main class="w-full min-h-screen py-1 md:w-2/3 lg:w-3/4">

                <div class="p-2 md:p-4">
                                    <livewire:change-propic :user="$user"/>
                       
                    <div class="items-center mt-8 sm:mt-14 text-[#202142]">
                        <div class="grid grid-cols-1 divide-y">
                            <div>
                                <h2 class="text-2xl font-bold sm:text-xl mb-3">Informazioni personali</h2>
                                @include('user.include.changeInformation')
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold sm:text-xl mt-5">Cambia password</h2>
                                @include('user.include.changePassword')
                            </div>
                            @can('delete', $user)
                                <div>
                                    <form action="{{ route('userSettingsDelete.show', $user->id) }}" method="get"
                                        class="mt-5 text-red-500">
                                        <button>
                                            Elimina account
                                        </button>
                                    </form>
                                </div>
                            @endcan

                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
    @include('layout.footer')
@endsection
