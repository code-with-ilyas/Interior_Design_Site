<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Edit Service</h3>

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

                    <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $service->title) }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="icon" class="block text-sm font-medium text-gray-700">Icon Class</label>
                                <input type="text" name="icon" id="icon" value="{{ old('icon', $service->icon) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <p class="mt-1 text-sm text-gray-500">Example: fas fa-tools, fa-solid fa-home, etc.</p>
                            </div>

                            <div>
                                <label for="service_category_id" class="block text-sm font-medium text-gray-700">Category</label>
                                <select name="service_category_id" id="service_category_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">-- Select Category --</option>
                                    @foreach($serviceCategories as $category)
                                        <option value="{{ $category->id }}" {{ old('service_category_id', $service->service_category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="md:col-span-2">
                                <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description</label>
                                <textarea name="short_description" id="short_description" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('short_description', $service->short_description) }}</textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label for="long_description" class="block text-sm font-medium text-gray-700">Long Description</label>
                                <textarea name="long_description" id="long_description" rows="6"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('long_description', $service->long_description) }}</textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label for="image" class="block text-sm font-medium text-gray-700">Main Image</label>
                                @if($service->image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="h-32 w-32 object-cover rounded">
                                    </div>
                                @endif
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <p class="mt-1 text-sm text-gray-500">Upload new service main image (JPG, PNG, GIF) - Max 2MB</p>
                            </div>

                            <div class="md:col-span-2">
                                <label for="additional_images" class="block text-sm font-medium text-gray-700">Additional Images</label>
                                <input type="file" name="additional_images[]" id="additional_images" accept="image/*" multiple
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <p class="mt-1 text-sm text-gray-500">Upload additional service images (JPG, PNG, GIF) - Max 2MB each</p>

                                @if($service->images->count() > 0)
                                    <div class="mt-4">
                                        <h4 class="text-sm font-medium text-gray-700 mb-2">Current Additional Images:</h4>
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                            @foreach($service->images as $image)
                                                <div class="relative group">
                                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->alt_text ?: $service->title }}" class="h-32 w-full object-cover rounded">
                                                    @if($image->is_primary)
                                                        <span class="absolute top-1 left-1 bg-yellow-500 text-white text-xs px-2 py-1 rounded">Primary</span>
                                                    @endif
                                                    <button type="button"
                                                        data-service-id="{{ $service->id }}"
                                                        data-image-id="{{ $image->id }}"
                                                        class="delete-service-image-btn absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mt-6 flex flex-wrap gap-3 justify-end">
                            <a href="{{ route('admin.services.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Update Service
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-service-image-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const serviceId = this.getAttribute('data-service-id');
                    const imageId = this.getAttribute('data-image-id');

                    if (confirm('Are you sure you want to delete this image?')) {
                        fetch(`/admin/services/${serviceId}/images/${imageId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Remove the image container from the DOM
                                this.closest('.relative.group').remove();

                                // Show success message
                                alert('Image deleted successfully');
                            } else {
                                alert('Failed to delete image');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred while deleting the image');
                        });
                    }
                });
            });
        });
    </script>
</x-app-layout>
