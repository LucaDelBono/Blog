<nav x-data="{ open: false }" class="sticky top-0 z-50 w-full bg-white border-b border-white">
    <header class="flex items-center justify-between py-3 px-6 border-b border-gray-100">
        <div id="header-left" class="flex items-center">
            <div class="text-gray-800 font-semibold">
                <a href="{{ route('index') }}"
                    class="text-yellow-500 text-3xl hover:text-yellow-600">&lt;{{ config('app.name') }}&gt;</a>
            </div>
            <div class="top-menu ml-10">
                <ul class="flex space-x-4 ">
                    <li>
                        <a class="text-xl flex space-x-2 items-center hover:text-yellow-600 text-yellow-500"
                            href="{{ route('index') }}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a class="text-xl flex space-x-2 items-center hover:text-yellow-500 text-gray-500"
                            href="{{ route('blogLatest') }}">
                            Post
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="header-right" class="flex items-center md:space-x-6">
            <div class="flex space-x-5">
                @guest
                    <a class="flex space-x-2 items-center hover:text-yellow-500 text-xl text-gray-500"
                        href="http://127.0.0.1:8000/login">
                        Accedi
                    </a>
                    <a class="flex space-x-2 items-center hover:text-yellow-500 text-xl text-gray-500"
                        href={{ route('register') }}>
                        Registrati
                    </a>
                @endguest
                @auth
                    <button x-on:click="open = !open"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-yellow-300"
                        type="button">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->getImageUrl() }}" alt="user photo">
                    </button>
                @endauth
            </div>
        </div>
    </header>
    @auth
        <div x-show="open" @click.outside="open = false" x-on:keydown.escape.window= "open = false" class="absolute mr-5 right-0 bg-gray-600 divide-y divide-yellow-500 rounded-lg shadow w-44" style="display:none">
            <div class="px-4 py-3 text-sm text-white">
                <div></div>
                <div class="font-medium truncate">{{ Auth::user()->nickname }}</div>
            </div>
            <ul class="py-2 text-sm text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                <li>
                    <a href="{{ route('profile') }}"
                        class="block px-4 py-2 hover:bg-yellow-500 hover:text-white">Profilo</a>
                </li>
                @if (Auth::user()->isAdmin() || Auth::user()->isEditor())
                    <li>
                        <a href="{{ route('post.create') }}"
                            class="block px-4 py-2 hover:bg-yellow-500 hover:text-white">Crea Post</a>
                    </li>
                @endif

                @can('admin')
                    <li>
                        <a href="{{ route('admin.index') }}" class="block px-4 py-2 hover:bg-yellow-500 hover:text-white">Admin
                            Dashboard</a>
                    </li>
                @endcan
                <li>
                    <a href="{{ route('userSettings.index') }}"
                        class="block px-4 py-2 hover:bg-yellow-500 hover:text-white">Impostazioni
                    </a>
                </li>
            </ul>
            <div class="py-2">
                <form action="{{ route('logout') }}" method="post"
                    class="block px-4 py-2 text-sm text-gray-200 hover:bg-yellow-500 hover:text-white cursor-pointer">
                    @csrf
                    <input type="submit" value="Logout" class="cursor-pointer w-full text-left">
                </form>
            </div>
        </div>
    @endauth
</nav>
@livewireScripts
