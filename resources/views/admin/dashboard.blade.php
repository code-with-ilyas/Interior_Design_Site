<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Welcome, Super Admin!</h3>
                    <p>{{ __("You're logged in as Super Admin!") }}</p>

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-6">
                       
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h4 class="font-medium text-blue-800">Total Users</h4>
                            <p class="text-2xl font-bold">{{ \App\Models\User::count() }}</p>
                        </div>

                        <div class="bg-green-50 p-4 rounded-lg">
                            <h4 class="font-medium text-green-800">Total Projects</h4>
                            <p class="text-2xl font-bold">{{ \App\Models\Project::count() }}</p>
                        </div>

                        <div class="bg-purple-50 p-4 rounded-lg">
                            <h4 class="font-medium text-purple-800">Pending Quotes</h4>
                            <p class="text-2xl font-bold">{{ \App\Models\Quote::pending()->count() }}</p>
                        </div>

                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <h4 class="font-medium text-yellow-800">Total Services</h4>
                            <p class="text-2xl font-bold">{{ \App\Models\Service::count() }}</p>
                        </div>

                        <div class="bg-indigo-50 p-4 rounded-lg">
                            <h4 class="font-medium text-indigo-800">Total Experts</h4>
                            <p class="text-2xl font-bold">{{ \App\Models\Expert::count() }}</p>
                        </div>

                        <div class="bg-teal-50 p-4 rounded-lg">
                            <h4 class="font-medium text-teal-800">Total Skills</h4>
                            <p class="text-2xl font-bold">{{ \App\Models\Skill::count() }}</p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="text-md font-medium mb-4">Quick Actions</h4>
                        <div class="flex flex-wrap gap-4">
                            <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Manage Users</a>
                            <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Manage Projects</a>
                            <a href="{{ route('admin.quotes.index') }}" class="px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600">View Quotes</a>
                            <a href="#" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Manage Services</a>
                            <a href="{{ route('admin.experts.index') }}" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">Manage Experts</a>
                            <a href="{{ route('admin.expert-categories.index') }}" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">Manage Expert Categories</a>
                            <a href="{{ route('admin.skills.index') }}" class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600">Manage Skills</a>
                            <a href="{{ route('admin.project-categories.index') }}" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">Manage Project Categories</a>
                            <a href="{{ route('admin.permissions.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Manage Permissions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
