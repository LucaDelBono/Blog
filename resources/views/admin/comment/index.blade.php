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
                            Utente
                        </th>
                        <th class="px-6 py-3">
                            Commento
                        </th>
                        <th class="px-6 py-3">
                            Post
                        </th>
                        <th class="px-6 py-3">
                            Data Creazione
                        </th>
                        <th class="px-6 py-3">
                            #
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr class="odd:bg-gray-900 even:bg-gray-800 border-b border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $comment->user->nickname }}
                            </td>
                            <td class="px-6 py-4 text-white">
                                {{ $comment->content }}
                            </td>
                            <td class="px-6 py-4 text-white">
                                <a href="{{ route('post.show', $comment->post_id) }}">{{ $comment->post_id }}</a>
                            </td>
                            <td class="px-6 py-4 text-white">
                                {{ $comment->created_at }}
                            </td>

                            <td class="px-6 py-4 text-white">
                                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="#" onclick="this.closest('form').submit();return false;"
                                        class="font-medium text-yellow-500 hover:underline">Elimina</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">{{ $comments->links() }}</div>
        </div>
    </div>
</div>
@include('layout.footer')
