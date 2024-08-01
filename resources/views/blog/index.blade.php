@extends('layout.appLayout')
@section('title', 'Novità | ')

@section('content')
    <body class="font-light antialiased">
        @include('layout.navbar')
        <main class="container mx-auto px-5 flex flex-grow">
            <div class="w-full grid grid-cols-4 gap-10">
                <div class="md:col-span-3 col-span-4">
                    <div class=" px-3 lg:px-7 py-6">
                        <livewire:post-list />
                    </div>
                </div>
                @include('blog.include.search-box')
            </div>
        </main>
        @include('layout.footer')
    </body>
@endsection
