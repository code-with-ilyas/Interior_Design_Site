<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">About Sections</h2>
            <a href="{{ route('admin.about.create') }}" class="px-4 py-2 bg-green-500 text-dark rounded hover:bg-green-600 text-sm">Add Section</a>
        </div>
    </x-slot>

    <section class="py-6 px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($sections as $section)
                <div class="border rounded-lg p-4 bg-white shadow-sm">
                    <h5 class="font-semibold mb-2">{{ $section->name }}</h5>
                    <p class="mb-3 text-gray-700">{{ $section->description }}</p>
                    @if($section->image)
                        <img src="{{ Storage::url($section->image) }}" class="h-48 w-full object-cover rounded mb-3">
                        
                    @endif
                    <div class="flex gap-2">
                        <a href="{{ route('admin.about.edit', $section->id) }}" class="px-3 py-1 bg-blue-500 text-dark rounded text-sm hover:bg-blue-600">Edit</a>
                        <form action="{{ route('admin.about.destroy', $section->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-500 text-dark rounded text-sm hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="col-span-2 text-center text-gray-700">No sections found.</p>
            @endforelse
        </div>
    </section>
</x-app-layout>
