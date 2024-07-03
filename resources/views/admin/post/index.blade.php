@extends('layout.appLayout')
@include('layout.navbar')
@include('admin.include.side-bar')

<div class="p-4 sm:ml-64">
    <div class="mt-3">
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
                        <tr
                            class="odd:bg-gray-900  even:bg-gray-800 border-b border-gray-700">
                            <td class="px-6 py-4 font-medium  whitespace-nowrap text-white">
                                {{$post->title}}
                            </td>
                            <td class="px-6 py-4 text-white">
                                {{Str::limit($post->content,50)}}
                            </td>
                            <td class="px-6 py-4 text-white">
                                {{$post->user->nickname}}
                            </td>
                            <td class="px-6 py-4 text-white">
                              {{$post->created_at->toDateString()}}
                            </td>
                            <td class="px-6 py-4 text-white">
                                <a href="{{route('post.show', $post->id)}}"
                                    class="font-medium text-yellow-500 hover:underline">Visualizza</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{$posts->links()}}
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
