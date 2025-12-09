<x-app-layout>
    <x-slot name="header">
        <h2>Create Gallery</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.gallery.create') }}" class="th-btn th-border mb-4">Add New Image</a>

            <div class="grid grid-cols-4 gap-4">
                @foreach($galleries as $gallery)
                <div class="bg-gray-800 p-4 rounded-lg">
                    <img src="{{ asset($gallery->image) }}" class="w-full h-40 object-cover rounded" alt="{{ $gallery->title }}">
                    <p class="text-white mt-2">{{ $gallery->title }}</p>
                    <div class="flex gap-2 mt-2">
                        <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="th-btn th-border">Edit</a>
                        <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="th-btn th-border">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
