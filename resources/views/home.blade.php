@extends('layout.appLayout')
@section('title', 'Home | ')
@section('content')

    <body class="font-light antialiased">
        @include('layout.navbar')
        <div class="w-full text-center py-32">
            <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
                Benvenuto su <span class="text-yellow-500">{{env('APP_NAME')}}</span>
            </h1>
            <p class="text-gray-500 text-lg mt-1">Il miglior blog sul mercato</p>
            <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block"
                href="{{route('blogLatest')}}">Inizia la
                lettura</a>
        </div>

        <main class="container mx-auto px-5 flex flex-grow">
            <div class="mb-10">
                <div class="mb-16">
                    <h2 class="mt-10 mb-5 text-3xl text-yellow-500 font-bold">Post in evidenza</h2>
                    <div class="w-full">
                        <div class="grid grid-cols-3 gap-10 w-full">
                            @foreach ($randomPosts as $randomPost)
                                <div class="md:col-span-1 col-span-3">
                                    <a href="{{ route('post.show', $randomPost->id) }}">
                                        <div>
                                            <img class="w-full rounded-xl" src="{{ $randomPost->getImageUrl() }}">
                                        </div>
                                    </a>
                                    <div class="mt-3">
                                        <div class="flex items-center mb-2">
                                            <p class="text-gray-500 text-sm">{{ $randomPost->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        <a class="text-xl font-bold text-gray-900">{{ $randomPost->title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold"
                        href="{{ route('blogLatest') }}">Visualizza altri post</a>
                </div>
                <hr>

                <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">Post recenti</h2>
                <div class="w-full mb-5">
                    <div class="grid grid-cols-3 gap-10 gap-y-32 w-full">
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
                <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold"
                    href="{{ route('blogLatest') }}">Visualizza altri post
                </a>
            </div>
        </main>

        @include('layout.footer')
    </body>
    @endsection
