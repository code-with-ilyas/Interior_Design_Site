<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Header + Action -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Add New Service</h3>
                        <a href="{{ route('admin.services.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Back to Services
                        </a>
                    </div>

                    <!-- Success / Error Messages -->
                    @if(session('success'))
                        <div class="mb-4">
                            <div class="font-medium text-green-600">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">Whoops! Something went wrong.</div>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('admin.services.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">

                            <!-- Service Title -->
                            <div>
                                <label for="service_title" class="block text-sm font-medium text-gray-700"> Title *</label>
                                <input type="text" name="service_title" id="service_title" value="{{ old('service_title') }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <!-- Service Description -->
                            <div>
                                <label for="service_description" class="block text-sm font-medium text-gray-700"> Description *</label>
                                <textarea name="service_description" id="service_description" rows="5" required
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('service_description') }}</textarea>
                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="mt-6 flex items-center justify-end gap-3">
                            <a href="{{ route('admin.services.index') }}"
                               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Save Service
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
