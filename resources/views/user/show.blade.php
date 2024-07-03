@extends('layout.appLayout')
@section('content')
    @include('layout.navbar')
    <div class="p-16">
        <div class="p-8 bg-white shadow mt-24">
            <div class="grid grid-cols-1 md:grid-cols-3">

                <div class="grid grid-cols-1 text-center order-last md:order-first mt-20 md:mt-0">
                    <div>
                        <p class="font-bold text-gray-700 text-xl">{{ $posts->count() }}</p>
                        <p class="text-gray-400">Post Pubblicati</p>
                    </div>
                </div>
                <div class="relative">
                    <div>
                        <img src="{{ $user->getImageUrl() }}"
                            class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500 fill:currentColor">
                    </div>
                </div>

                <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                    @can('update', $user)
                        <form action="{{ route('userSettings.index', $user->id) }}" method="get">
                            <button type="submit"
                                class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                                Modifica
                            </button>
                    @endcan

                    </form>
                </div>
            </div>
            <div class="mt-20 text-center border-b pb-12">
                <h1 class="text-4xl font-medium text-gray-700">{{ $user->nickname }}</h1>
                <p class="font-light text-gray-600 mt-3">{{ $user->about }}</p>
            </div>



            <div class="mt-6 text-center">
                <p class="text-3xl text-yellow-500 py-2 px-4  font-medium mt-4">Post pubblicati </p>
                <div class="w-full mb-5 mt-10">
                    <div class="grid grid-cols-2 gap-10 gap-y-32 w-full">
                        @foreach ($posts as $post)
                            <div class="md:col-span-1 col-span-3">

                                <a href="{{ route('post.show', $post->id) }}">
                                    <div>
                                        <img class="w-full rounded-xl" src="{{ $post->getImageUrl() }}">
                                    </div>
                                </a>
                                <div class="mt-3"><a href="{{ route('post.show', $post->id) }}">
                                    </a>
                                    <div class="flex items-center mb-2"><a href="http://127.0.0.1:8000/blog/laravel-34">
                                        </a>
                                        <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                    <a href="{{ route('post.show', $post->id) }}">
                                        <h3 class="text-xl font-bold text-gray-900">{{ $post->title }}</h3>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10">{{ $posts->links() }}</div>
    </div>
    @include('layout.footer')
    </section>
@endsection
