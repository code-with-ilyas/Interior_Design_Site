<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex min-h-screen bg-gray-100">


        <aside class="w-64 bg-gray-800 text-white flex-shrink-0">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
                <nav class="flex flex-col gap-2">

                    <a href="#" class="px-4 py-2 rounded hover:bg-gray-700">Dashboard</a>


                    <div x-data="{ open: false }" class="flex flex-col">
                        <button @click="open = !open"
                            class="px-4 py-2 rounded hover:bg-gray-700 flex justify-between items-center w-full">
                            Users & Customers

                            <svg :class="{'rotate-180': open}"
                                class="w-4 h-4 transform transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="open" class="flex flex-col ml-4 mt-1 gap-1" x-transition>
                            <a href="#" class="px-4 py-2 rounded hover:bg-gray-700">Manage Users</a>
                            <a href="{{ route('admin.customers.index') }}" class="px-4 py-2 rounded hover:bg-gray-700">Customers</a>
                        </div>
                    </div>


                    <div x-data="{ open: false }" class="flex flex-col">
                        <button @click="open = !open" class="px-4 py-2 rounded hover:bg-gray-700 flex justify-between items-center w-full">
                            Gallery & Instagram
                            <svg :class="{'rotate-180': open}"
                                class="w-4 h-4 transform transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="flex flex-col ml-4 mt-1 gap-1">
                            <a href="{{ route('admin.gallery.index') }}" class="px-4 py-2 rounded hover:bg-gray-700">Gallery</a>
                            <a href="{{ route('admin.instagram.index') }}" class="px-4 py-2 rounded hover:bg-gray-700">Instagram</a>
                        </div>
                    </div>


                    <div x-data="{ open: false }" class="flex flex-col">
                        <button @click="open = !open" class="px-4 py-2 rounded hover:bg-gray-700 flex justify-between items-center w-full">
                            Services & About
                            <svg :class="{'rotate-180': open}"
                                class="w-4 h-4 transform transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="flex flex-col ml-4 mt-1 gap-1">
                            <a href="{{ route('admin.services.index') }}" class="px-4 py-2 rounded hover:bg-gray-700">Services</a>
                            <a href="{{ route('admin.about.index') }}" class="px-4 py-2 rounded hover:bg-gray-700">About Section</a>
                        </div>
                    </div>


                    <div x-data="{ open: false }" class="flex flex-col">
                        <button @click="open = !open" class="px-4 py-2 rounded hover:bg-gray-700 flex justify-between items-center w-full">
                            Projects & Categories
                            <svg :class="{'rotate-180': open}"
                                class="w-4 h-4 transform transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="flex flex-col ml-4 mt-1 gap-1">
                            <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 rounded hover:bg-gray-700">Projects</a>
                            <a href="{{ route('admin.project-categories.index') }}" class="px-4 py-2 rounded hover:bg-gray-700">Project Categories</a>
                        </div>
                    </div>


                    <div x-data="{ open: false }" class="flex flex-col">
                        <button @click="open = !open" class="px-4 py-2 rounded hover:bg-gray-700 flex justify-between items-center w-full">
                            Experts & Skills
                            <svg :class="{'rotate-180': open}"
                                class="w-4 h-4 transform transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="flex flex-col ml-4 mt-1 gap-1">
                            <a href="{{ route('admin.experts.index') }}" class="px-4 py-2 rounded hover:bg-gray-700">Experts</a>
                            <a href="{{ route('admin.skills.index') }}" class="px-4 py-2 rounded hover:bg-gray-700">Skills</a>
                        </div>
                    </div>


                    <div x-data="{ open: false }" class="flex flex-col">
                        <button @click="open = !open" class="px-4 py-2 rounded hover:bg-gray-700 flex justify-between items-center w-full">
                            Testimonials & Quotes
                            <svg :class="{'rotate-180': open}"
                                class="w-4 h-4 transform transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="flex flex-col ml-4 mt-1 gap-1">
                            <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 rounded hover:bg-gray-700">Testimonials</a>
                            <a href="{{ route('admin.quotes.index') }}" class="px-4 py-2 rounded hover:bg-gray-700">Quotes</a>
                        </div>
                    </div>
                </nav>


                <script src="//unpkg.com/alpinejs" defer></script>

            </div>
        </aside>


        <div class="flex-1 p-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Welcome, Super Admin!</h3>
                <p>{{ __("You're logged in as Super Admin!") }}</p>

                <div class="mt-6 flex flex-col gap-4">
                    <div class="dashboard-box box1">
                        <h4>Total Users</h4>
                        <p>{{ \App\Models\User::count() }}</p>
                    </div>

                    <div class="dashboard-box box1">
                        <h4>Total Gallery Images</h4>
                        <p>{{ \App\Models\Gallery::count() }}</p>
                    </div>

                    <div class="dashboard-box box2">
                        <h4>Total Customers</h4>
                        <p>{{ \App\Models\Customer::count() }}</p>
                    </div>

                    <div class="dashboard-box box3">
                        <h4>About Section</h4>
                        <p>{{ \App\Models\AboutSection::count() }}</p>
                    </div>

                    <div class="dashboard-box box2">
                        <h4>Total Services</h4>
                        <p>{{ \App\Models\Service::count() }}</p>
                    </div>

                    <div class="dashboard-box box1">
                        <h4>Total Instagram Images</h4>
                        <p>{{ \App\Models\InstagramGallery::count() }}</p>
                    </div>

                    <div class="dashboard-box box1">
                        <h4>Total Testimonials</h4>
                        <p>{{ \App\Models\Testimonial::count() }}</p>
                    </div>

                    <div class="dashboard-box box2">
                        <h4>Total Projects</h4>
                        <p>{{ \App\Models\Project::count() }}</p>
                    </div>

                    <div class="dashboard-box box3">
                        <h4>Pending Quotes</h4>
                        <p>{{ \App\Models\Quote::pending()->count() }}</p>
                    </div>

                    <div class="dashboard-box box4">
                        <h4>Total Services</h4>
                        <p>{{ \App\Models\Service::count() }}</p>
                    </div>

                    <div class="dashboard-box box5">
                        <h4>Total Experts</h4>
                        <p>{{ \App\Models\Expert::count() }}</p>
                    </div>

                    <div class="dashboard-box box6">
                        <h4>Total Skills</h4>
                        <p>{{ \App\Models\Skill::count() }}</p>
                    </div>
                </div>
            </div>
        </div>



        <style>
            .dashboard-box {
                flex: 1;
                min-width: 150px;
                padding: 1rem;
                border-radius: 0.5rem;
                color: #fff;
                text-align: center;
                font-weight: bold;
            }

            .dashboard-box h4 {
                font-weight: 500;
                margin-bottom: 0.5rem;
                font-size: 0.9rem;
            }

            .dashboard-box p {
                font-size: 1.2rem;
            }

            .box1 {
                background-color: #3b82f6;
            }

            .box2 {
                background-color: #10b981;
            }

            .box3 {
                background-color: #8b5cf6;
            }

            .box4 {
                background-color: #facc15;
                color: #000;
            }

            .box5 {
                background-color: #6366f1;
            }

            .box6 {
                background-color: #14b8a6;
            }

            .quick-btn {
                padding: 0.5rem 1rem;
                border-radius: 0.375rem;
                color: #fff;
                font-weight: 500;
                transition: all 0.3s ease;
                text-decoration: none;
            }
        </style>
</x-app-layout>