<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add About Section</h2>
    </x-slot>

    <div class="py-10 px-4 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block font-semibold mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-2">Description</label>
                    <textarea name="description" rows="5" class="w-full px-3 py-2 border rounded-lg" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-2">Image</label>
                    <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border rounded-lg">
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('admin.about.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
