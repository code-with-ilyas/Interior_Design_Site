<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Service Category Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Service Category Details</h3>
                        <div>
                            <a href="{{ route('admin.service-categories.edit', $serviceCategory) }}" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 mr-2">
                                Edit
                            </a>
                            <form action="{{ route('admin.service-categories.destroy', $serviceCategory) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this category? This action cannot be undone if services are associated with this category.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <div class="mb-6">
                                <h4 class="text-xl font-semibold mb-2">{{ $serviceCategory->name }}</h4>
                                @if($serviceCategory->description)
                                    <p class="text-gray-600">{{ $serviceCategory->description }}</p>
                                @endif
                            </div>

                            @if($serviceCategory->image)
                                <div class="mb-6">
                                    <h5 class="text-lg font-medium mb-2">Category Image</h5>
                                    <div class="mb-4">
                                        <img src="{{ asset('storage/' . $serviceCategory->image) }}" alt="{{ $serviceCategory->name }}" class="h-64 w-auto object-contain rounded-lg">
                                    </div>
                                </div>
                            @endif

                            @if($serviceCategory->services->count() > 0)
                                <div class="mb-6">
                                    <h5 class="text-lg font-medium mb-2">Associated Services</h5>
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach($serviceCategory->services as $service)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $service->title }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            @if($service->image)
                                                                <span class="text-green-600">With Image</span>
                                                            @else
                                                                <span class="text-gray-500">No Image</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h5 class="text-lg font-medium mb-4">Category Information</h5>
                                <dl class="space-y-2">
                                    <div>
                                        <dt class="font-medium text-gray-700">ID</dt>
                                        <dd class="ml-0">{{ $serviceCategory->id }}</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Name</dt>
                                        <dd class="ml-0">{{ $serviceCategory->name }}</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Slug</dt>
                                        <dd class="ml-0">{{ $serviceCategory->slug }}</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Status</dt>
                                        <dd class="ml-0">
                                            <span class="{{ $serviceCategory->is_active ? 'text-green-600' : 'text-red-600' }}">
                                                {{ $serviceCategory->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Order</dt>
                                        <dd class="ml-0">{{ $serviceCategory->order }}</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Number of Services</dt>
                                        <dd class="ml-0">{{ $serviceCategory->services->count() }}</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Created At</dt>
                                        <dd class="ml-0">{{ $serviceCategory->created_at->format('M d, Y H:i') }}</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Updated At</dt>
                                        <dd class="ml-0">{{ $serviceCategory->updated_at->format('M d, Y H:i') }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.service-categories.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            ← Back to Categories
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
