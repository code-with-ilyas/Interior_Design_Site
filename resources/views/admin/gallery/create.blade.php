<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Gallery Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-lg font-medium mb-4">Add New Gallery Image</h3>

                    <!-- Validation Errors -->
                    @if ($errors->any())
                    <div class="mb-4">
                        <div class="font-medium text-red-600">Whoops! Something went wrong.</div>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-gray-700">Image Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}"
                                    placeholder="Optional title"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                              focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <!-- Image Upload -->
                            <div class="md:col-span-2">
                                <label for="image" class="block text-sm font-medium text-gray-700">Upload Image *</label>
                                <input type="file" name="image" id="image" accept="image/*" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                              focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <p class="mt-1 text-sm text-gray-500">Upload an image (JPG, PNG, GIF) - Max 2MB</p>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-6 flex items-center justify-end">
                            <a href="{{ route('admin.gallery.index') }}"
                                class="mr-3 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                Cancel
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-dark rounded hover:bg-blue-600">
                                Save Image
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>