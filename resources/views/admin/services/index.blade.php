<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2>Services</h2>
            <a href="{{ route('admin.services.create') }}" class="btn btn-green">Add Service</a>
        </div>
    </x-slot>

    <div class="py-6 px-4 grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse($services as $service)
            <div class="border rounded-lg p-4 bg-white shadow">
                <h5 class="font-semibold">{{ $service->service_title }}</h5>
                <p>{{ $service->service_description }}</p>
                <div class="flex gap-2 mt-2">
                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-blue">Edit</a>
                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-red" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p>No services found.</p>
        @endforelse
    </div>
</x-app-layout>
