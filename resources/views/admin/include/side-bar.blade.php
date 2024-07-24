<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-white sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium text-lg">
            <li>
                <a wire:navigate href="{{ route('admin.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-yellow-500 group">
                    <div
                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white">
                    <i class="fa-solid fa-chart-pie" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 18"></i>
                </div>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('admin.posts') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-yellow-500 group">
                    <div
                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white">
                    <i class="fa-solid fa-paper-plane" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 18"></i>
                </div>
                    <span class="flex-1 ms-3 whitespace-nowrap">Post</span>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('admin.users') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-yellow-500 group">
                    <div
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white">
                        <i class="fa-solid fa-user-group" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 18"></i>
                    </div>
                    <span class="flex-1 ms-3 whitespace-nowrap">Utenti</span>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('admin.comments') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-yellow-500 group">
                    <div
                    class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white">
                    <i class="fa-solid fa-comment" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 18"></i>
                </div>
                    <span class="flex-1 ms-3 whitespace-nowrap">Commenti</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
