<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">About</h2>
            <a href="{{ route('admin.about.create') }}" class="px-4 py-2 bg-green-500 rounded">Add About</a>
        </div>
    </x-slot>

    <div class="py-6 px-4 grid md:grid-cols-2 gap-6">
        @forelse($abouts as $about)
            <div class="bg-white p-4 rounded shadow">
                <h4 class="font-semibold mb-2">{{ $about->name }}</h4>
                <p class="text-gray-700 mb-3">{{ $about->description }}</p>

                @if($about->image)
                    <img src="{{ Storage::url($about->image) }}" class="h-40 w-full object-cover rounded mb-3">
                @endif

                <div class="flex gap-2">
                    <a href="{{ route('admin.about.edit', $about->id) }}" class="px-3 py-1 bg-blue-500 rounded">Edit</a>

                    <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="px-3 py-1 bg-red-500 rounded">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p>No about data found.</p>
        @endforelse
    </div>
</x-app-layout>
