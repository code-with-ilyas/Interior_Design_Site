<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Services</h2>
            <a href="{{ route('admin.services.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Add Service</a>
        </div>
    </x-slot>

    <div class="py-6 px-4 grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse($services as $service)
            <div class="border rounded-lg p-4 bg-white shadow">
                <h5 class="font-semibold">{{ $service->service_title }}</h5>
                <p>{{ $service->service_description }}</p>
                <div class="flex gap-2 mt-2">
                    <a href="{{ route('admin.services.edit', $service->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Edit</a>
                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p>No services found.</p>
        @endforelse
    </div>
</x-app-layout>
