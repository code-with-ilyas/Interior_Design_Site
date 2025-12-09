<x-app-layout>
    <x-slot name="header">
        <h2>Edit Gallery Image</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="text-white">Title</label>
                    <input type="text" name="title" value="{{ $gallery->title }}" class="w-full p-2 rounded" placeholder="Optional title">
                </div>

                <div class="mb-4">
                    <label class="text-white">Image</label>
                    <input type="file" name="image">
                    <img src="{{ asset($gallery->image) }}" class="w-32 h-32 mt-2 object-cover rounded">
                </div>

                <button type="submit" class="th-btn th-border">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
