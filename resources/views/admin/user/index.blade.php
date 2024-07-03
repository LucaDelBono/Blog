@extends('layout.appLayout')
@include('layout.navbar')
@include('admin.include.side-bar')

<div class="p-4 sm:ml-64">
    <div class="mt-3">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-yellow-500">
                    <tr>
                        <th class="px-6 py-3">
                            Nickname
                        </th>
                        <th class="px-6 py-3">
                            Nome
                        </th>
                        <th class="px-6 py-3">
                            Cognome
                        </th>
                        <th class="px-6 py-3">
                            Email
                        </th>
                        <th class="px-6 py-3">
                            Ruolo
                        </th>
                        <th class="px-6 py-3">
                            #
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr
                            class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700">
                            <td class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                {{ $user->nickname }}
                            </td>
                            <td class="px-6 py-4 text-white">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 text-white">
                                {{ $user->surname }}
                            </td>
                            <td class="px-6 py-4 text-white">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 text-white">
                                {{ $user->role }}
                            </td>
                            <td class="px-6 py-4 text-white flex gap-2">
                                <a href="{{ route('users.show', $user->id) }}"
                                    class="font-medium text-yellow-500 hover:underline">Visualizza</a>
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="font-medium text-yellow-500 hover:underline">Modifica</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
