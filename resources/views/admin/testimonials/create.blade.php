<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Testimonial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <!-- Left Column: Client Information -->
                            <div>
                                <div class="mb-6">
                                    <label for="client_name" class="block text-sm font-medium text-gray-700 mb-2">Client Name *</label>
                                    <input type="text" name="client_name" id="client_name" value="{{ old('client_name') }}"
                                           class="w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500" required>
                                    @error('client_name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="designation" class="block text-sm font-medium text-gray-700 mb-2">Designation</label>
                                    <input type="text" name="designation" id="designation" value="{{ old('designation') }}"
                                           class="w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="e.g., Company Owner, CEO, Manager">
                                    @error('designation')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="testimonial_text" class="block text-sm font-medium text-gray-700 mb-2">Testimonial Text *</label>
                                    <textarea name="testimonial_text" id="testimonial_text" rows="5"
                                              class="w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500" required
                                              placeholder="Enter the client's testimonial here...">{{ old('testimonial_text') }}</textarea>
                                    @error('testimonial_text')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Right Column: Image and Settings -->
                            <div>
                                <div class="mb-6">
                                    <label for="client_image" class="block text-sm font-medium text-gray-700 mb-2">Client Image</label>
                                    <input type="file" name="client_image" id="client_image"
                                           class="w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                                           accept="image/*">
                                    <p class="mt-1 text-sm text-gray-500">Recommended size: 300x300 pixels. JPG, PNG, or WEBP format.</p>
                                    @error('client_image')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}"
                                           class="w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                                           min="0" placeholder="0">
                                    <p class="mt-1 text-sm text-gray-500">Lower numbers appear first. Default is 0.</p>
                                    @error('sort_order')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="is_active" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                    <select name="is_active" id="is_active"
                                            class="w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="1" {{ old('is_active', 1) ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('is_active')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 pt-6 border-t border-gray-200">
                            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Create Testimonial
                            </button>

                            <a href="{{ route('admin.testimonials.index') }}"
                               class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
