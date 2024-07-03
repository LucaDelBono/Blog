@extends('layout.appLayout')
@section('title', 'Datato | ')

@section('content')

    <body class="font-light antialiased">
        @include('layout.navbar')
        <main class="container mx-auto px-5 flex flex-grow">
            <div class="w-full grid grid-cols-4 gap-10">
                <div class="md:col-span-3 col-span-4">
                    <div id="posts" class=" px-3 lg:px-7 py-6">
                        <div class="flex justify-between items-center border-b border-gray-100">
                            <div id="filter-selector" class="flex items-center space-x-4 font-light ">
                                <form action="{{ route('blogLatest') }}" method="get">
                                    <button class="text-gray-500 py-4">Novità</button>
                                </form>
                                <form action="{{ route('blogOldest') }}" method="get">
                                    <button class="text-gray-900 py-4 border-b border-gray-700">Datato</button>
                                </form>
                            </div>
                        </div>
                        @include('blog.card-blog')
                    </div>
                    {{$posts->links()}}
                </div>
                @include('blog.include.search-box')
            </div>
        </main>

        @include('layout.footer')
    </body>
@endsection
