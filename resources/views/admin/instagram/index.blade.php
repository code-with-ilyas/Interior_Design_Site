<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Instagram Gallery</h2>
            <a href="{{ route('admin.instagram.create') }}" class="px-4 py-2 bg-blue-500 text-dark rounded hover:bg-blue-600">
                Add New Image
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Success Message -->
                    @if(session('success'))
                    <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Uploaded On</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($images as $img)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $img->id }}</td>

                                    <td class="px-6 py-4">
                                        @if($img->image)
                                        <img src="{{ Storage::url($img->image) }}" alt="Instagram Image"
                                            class="h-10 w-10 rounded-full object-cover border">
                                        @else
                                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                            <span class="text-xs text-gray-500">N/A</span>
                                        </div>
                                        @endif
                                    </td>


                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $img->created_at->format('d M Y') }}</td>

                                    <td class="px-6 py-4 text-sm font-medium flex gap-4">
                                        <a href="{{ route('admin.instagram.edit', $img->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>

                                        <form action="{{ route('admin.instagram.destroy', $img->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="text-red-600 hover:text-red-900">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                        No images uploaded yet.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if(method_exists($images, 'links'))
                    <div class="mt-4">
                        {{ $images->links() }}
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>