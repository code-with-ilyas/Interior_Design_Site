<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Customer</h2>
    </x-slot>
    <br>

    <div class="py-10 px-4 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium">Add New Customer</h3>
                <a href="{{ route('admin.customers.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Back to List</a>
            </div>

            <form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Customer Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea name="description"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                        rows="4" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Logos (Multiple allowed)</label>
                    <div id="logo-upload-container">
                        <div class="logo-input-group mb-2">
                            <input type="file" name="logo_images[]" accept="image/*"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                    </div>
                    <button type="button" id="add-logo-btn" class="mt-2 px-3 py-1 bg-gray-500 text-white rounded-lg hover:bg-gray-600 text-sm">Add Another Logo</button>
                </div>

                <div class="flex justify-end">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.customers.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
                    </div>
                </div>
            </form>
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
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
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
