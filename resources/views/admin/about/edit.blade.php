<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit About</h2>
    </x-slot>
<br>
    <div class="py-10 px-4 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-semibold mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name', $about->name) }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-2">Description</label>
                    <textarea name="description" rows="5" class="w-full border rounded px-3 py-2" required>{{ old('description', $about->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-2">Image</label>
                    @if($about->image)
                        <img src="{{ Storage::url($about->image) }}" class="h-40 mb-3 rounded">
                    @endif
                    <input type="file" name="image" class="w-full border rounded px-3 py-2">
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('admin.about.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</a>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
