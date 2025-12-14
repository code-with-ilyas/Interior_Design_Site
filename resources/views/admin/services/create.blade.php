<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Service</h2>
    </x-slot>

    <div class="py-10 px-4 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block font-semibold mb-2">Service Title</label>
                    <input type="text" name="service_title" value="{{ old('service_title') }}" class="w-full border px-3 py-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-2">Service Description</label>
                    <textarea name="service_description" rows="5" class="w-full border px-3 py-2 rounded" required>{{ old('service_description') }}</textarea>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('admin.services.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
