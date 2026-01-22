<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Gallery Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Gallery Category Details</h3>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.gallery-categories.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Back to List</a>
                            <a href="{{ route('admin.gallery-categories.edit', $galleryCategory->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-md font-medium text-gray-700 mb-3">Basic Information</h4>

                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-500">ID</p>
                                    <p class="font-medium">{{ $galleryCategory->id }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Name</p>
                                    <p class="font-medium">{{ $galleryCategory->name }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Slug</p>
                                    <p class="font-medium">{{ $galleryCategory->slug }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Created At</p>
                                    <p class="font-medium">{{ $galleryCategory->created_at->format('M d, Y H:i') }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Updated At</p>
                                    <p class="font-medium">{{ $galleryCategory->updated_at->format('M d, Y H:i') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-md font-medium text-gray-700 mb-3">Description</h4>
                            <div>
                                @if($galleryCategory->description)
                                    <p class="font-medium">{{ $galleryCategory->description }}</p>
                                @else
                                    <p class="text-gray-500 italic">No description provided</p>
                                @endif
                            </div>

                            <h4 class="text-md font-medium text-gray-700 mt-4">Galleries Count</h4>
                            <div>
                                <p class="font-medium">{{ $galleryCategory->galleries->count() }} galleries</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
