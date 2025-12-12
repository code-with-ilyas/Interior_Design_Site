<div class="fixed left-0 top-16 h-full w-64 bg-white shadow-lg z-30 transform transition-transform duration-300 ease-in-out -translate-x-full md:translate-x-0" id="sidebar">
    <div class="h-full overflow-y-auto py-4">
        <nav class="space-y-1 px-2">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-800' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                Dashboard
            </a>

            <!-- Projects Dropdown -->
            <div x-data="{ open: {{ request()->routeIs('admin.projects.*') || request()->routeIs('admin.project-categories.*') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                        class="flex items-center justify-between w-full px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.projects.*') || request()->routeIs('admin.project-categories.*') ? 'bg-blue-100 text-blue-800' : 'text-gray-700 hover:bg-gray-100' }}">
                    <div class="flex items-center">
                        <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        Projects
                    </div>
                    <svg :class="{'rotate-180': open}" class="h-4 w-4 transform transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="mt-1 ml-4 space-y-1">
                    <a href="{{ route('admin.projects.index') }}"
                       class="block px-4 py-2 text-sm rounded-md {{ request()->routeIs('admin.projects.index') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50' }}">
                        Projects List
                    </a>
                    <a href="{{ route('admin.project-categories.index') }}"
                       class="block px-4 py-2 text-sm rounded-md {{ request()->routeIs('admin.project-categories.index') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50' }}">
                        Project Categories
                    </a>
                </div>
            </div>

            <!-- Experts Dropdown -->
            <div x-data="{ open: {{ request()->routeIs('admin.experts.*') || request()->routeIs('admin.expert-categories.*') || request()->routeIs('admin.skills.*') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                        class="flex items-center justify-between w-full px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.experts.*') || request()->routeIs('admin.expert-categories.*') || request()->routeIs('admin.skills.*') ? 'bg-blue-100 text-blue-800' : 'text-gray-700 hover:bg-gray-100' }}">
                    <div class="flex items-center">
                        <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                        Experts
                    </div>
                    <svg :class="{'rotate-180': open}" class="h-4 w-4 transform transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="mt-1 ml-4 space-y-1">
                    <a href="{{ route('admin.experts.index') }}"
                       class="block px-4 py-2 text-sm rounded-md {{ request()->routeIs('admin.experts.index') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50' }}">
                        Experts List
                    </a>
                    <a href="{{ route('admin.expert-categories.index') }}"
                       class="block px-4 py-2 text-sm rounded-md {{ request()->routeIs('admin.expert-categories.index') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50' }}">
                        Expert Categories
                    </a>
                    <a href="{{ route('admin.skills.index') }}"
                       class="block px-4 py-2 text-sm rounded-md {{ request()->routeIs('admin.skills.index') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50' }}">
                        Manage Skills
                    </a>
                </div>
            </div>

            <!-- Quotes Dropdown -->
            <div x-data="{ open: {{ request()->routeIs('admin.quotes.*') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                        class="flex items-center justify-between w-full px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.quotes.*') ? 'bg-blue-100 text-blue-800' : 'text-gray-700 hover:bg-gray-100' }}">
                    <div class="flex items-center">
                        <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                        Quotes
                    </div>
                    <svg :class="{'rotate-180': open}" class="h-4 w-4 transform transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="mt-1 ml-4 space-y-1">
                    <a href="{{ route('admin.quotes.index') }}"
                       class="block px-4 py-2 text-sm rounded-md {{ request()->routeIs('admin.quotes.index') && !request()->has('status') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50' }}">
                        Quotes List
                    </a>
                    <a href="{{ route('admin.quotes.index', ['status' => 'pending']) }}"
                       class="block px-4 py-2 text-sm rounded-md {{ request()->routeIs('admin.quotes.index') && request()->get('status') === 'pending' ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50' }}">
                        Pending Quotes
                    </a>
                </div>
            </div>

            <!-- Permissions -->
            <a href="{{ route('admin.permissions.index') }}"
               class="flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.permissions.*') ? 'bg-blue-100 text-blue-800' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                </svg>
                Permissions Management
            </a>
        </nav>
    </div>
</div>

<!-- Sidebar overlay for mobile -->
<div class="fixed inset-0 z-20 bg-black bg-opacity-50 hidden" id="sidebar-overlay"></div>

<!-- Sidebar toggle button for mobile -->
<button id="sidebar-toggle" class="md:hidden fixed top-4 left-4 z-40 p-2 rounded-md bg-white shadow-md">
    <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>
