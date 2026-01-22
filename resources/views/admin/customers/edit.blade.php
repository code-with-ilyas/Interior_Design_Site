<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Edit Customer</h3>

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

                    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name *</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $customer->description) }}</textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Current Logos</label>
                                <div class="mt-2 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                    @foreach($customerLogos as $index => $logo)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $logo) }}" alt="Logo {{ $index + 1 }}" class="h-32 w-full object-contain border rounded">
                                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                                <label class="flex items-center text-white text-xs">
                                                    <input type="checkbox" name="remove_logos[]" value="{{ $index }}" class="mr-1">
                                                    Remove
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="md:col-span-2">
                                <label for="logo_images" class="block text-sm font-medium text-gray-700">Add More Logos</label>
                                <div id="logo-upload-container" class="mt-2">
                                    <div class="logo-input-group mb-2">
                                        <input type="file" name="logo_images[]" id="logo_images" accept="image/*"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    </div>
                                </div>
                                <button type="button" id="add-logo-btn" class="mt-2 px-3 py-1 bg-gray-500 text-white rounded text-sm">Add Another Logo</button>
                                <p class="mt-1 text-sm text-gray-500">Upload customer logos (JPG, PNG, GIF) - Max 2MB each</p>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end">
                            <a href="{{ route('admin.customers.index') }}" class="mr-3 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Update Customer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('logo-upload-container');
            const addButton = document.getElementById('add-logo-btn');

            addButton.addEventListener('click', function() {
                const newInputGroup = document.createElement('div');
                newInputGroup.className = 'logo-input-group mb-2';
                newInputGroup.innerHTML = `
                    <div class="flex items-center">
                        <input type="file" name="logo_images[]" accept="image/*"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <button type="button" class="remove-logo-btn ml-2 px-2 py-1 bg-red-500 text-white rounded text-sm">Remove</button>
                    </div>
                `;
                container.appendChild(newInputGroup);

                // Add event listener to the new remove button
                newInputGroup.querySelector('.remove-logo-btn').addEventListener('click', function() {
                    newInputGroup.remove();
                });
            });

            // Add event listener to existing remove buttons
            document.querySelectorAll('.remove-logo-btn').forEach(button => {
                button.addEventListener('click', function() {
                    this.closest('.logo-input-group').remove();
                });
            });
        });
    </script>
</x-app-layout>
