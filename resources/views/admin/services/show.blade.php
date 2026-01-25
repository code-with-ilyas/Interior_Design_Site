<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Service Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Service Details</h3>
                        <div>
                            <a href="{{ route('admin.services.edit', $service) }}" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 mr-2">
                                Edit
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this service?');">
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
                                <h4 class="text-xl font-semibold mb-2">{{ $service->title }}</h4>
                                @if($service->short_description)
                                    <p class="text-gray-600">{{ $service->short_description }}</p>
                                @endif
                            </div>

                            @if($service->image)
                                <div class="mb-6">
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-auto rounded-lg">
                                </div>
                            @endif

                            @if($service->long_description)
                                <div class="mb-6">
                                    <h5 class="text-lg font-medium mb-2">Description</h5>
                                    <div class="prose max-w-none">
                                        {!! nl2br(e($service->long_description)) !!}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h5 class="text-lg font-medium mb-4">Service Information</h5>
                                <dl class="space-y-2">
                                    <div>
                                        <dt class="font-medium text-gray-700">ID</dt>
                                        <dd class="ml-0">{{ $service->id }}</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Title</dt>
                                        <dd class="ml-0">{{ $service->title }}</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Icon</dt>
                                        <dd class="ml-0">
                                            @if($service->icon)
                                                <i class="{{ $service->icon }} mr-2"></i> {{ $service->icon }}
                                            @else
                                                <span class="text-gray-500">No icon</span>
                                            @endif
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Slug</dt>
                                        <dd class="ml-0">{{ $service->slug }}</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Created At</dt>
                                        <dd class="ml-0">{{ $service->created_at->format('M d, Y H:i') }}</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Updated At</dt>
                                        <dd class="ml-0">{{ $service->updated_at->format('M d, Y H:i') }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.services.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            ← Back to Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
