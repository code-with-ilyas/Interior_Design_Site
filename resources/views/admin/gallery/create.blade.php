<x-app-layout>
    <x-slot name="header">
        <h2>Create Gallery Image</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="text-dark">Image Title</label>
                    <input type="text" name="title" class=" p-2 rounded" placeholder="Optional title">
                </div>

                <div class="mb-4">
                    <label class="text-dark">Upload Image</label>
                    <input type="file" name="image" required>
                </div>

                <button type="submit" class="th-btn th-border">Save</button>
            </form>
        </div>
    </div>
</x-app-layout>
