<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Expert Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Expert Category Details</h3>
                        <div>
                            @can('edit expert categories')
                                <a href="{{ route('admin.expert-categories.edit', $expertCategory) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mr-2">
                                    Edit Category
                                </a>
                            @endcan
                            <a href="{{ route('admin.expert-categories.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                Back to Categories
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-700 mb-2">Name</h4>
                            <p class="text-gray-900">{{ $expertCategory->name }}</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-700 mb-2">Slug</h4>
                            <p class="text-gray-900">{{ $expertCategory->slug }}</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg md:col-span-2">
                            <h4 class="font-medium text-gray-700 mb-2">Description</h4>
                            <p class="text-gray-900">{{ $expertCategory->description ?? 'No description provided.' }}</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-700 mb-2">Created At</h4>
                            <p class="text-gray-900">{{ $expertCategory->created_at->format('M d, Y H:i') }}</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-700 mb-2">Updated At</h4>
                            <p class="text-gray-900">{{ $expertCategory->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-6">
                        <h4 class="text-lg font-medium mb-4">Experts in this Category</h4>

                        @if($expertCategory->experts->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($expertCategory->experts as $expert)
                                    <div class="border border-gray-200 rounded-lg p-4">
                                        <div class="flex items-center">
                                            @if($expert->image)
                                                <img src="{{ asset('storage/' . $expert->image) }}" alt="{{ $expert->name }}" class="h-12 w-12 rounded-full object-cover mr-3">
                                            @else
                                                <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                                                    <span class="text-gray-500 text-xs">No Image</span>
                                                </div>
                                            @endif
                                            <div>
                                                <h5 class="font-medium text-gray-900">{{ $expert->name }}</h5>
                                                <p class="text-sm text-gray-500">{{ $expert->designation ?? 'No designation' }}</p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            @foreach($expert->skills->take(3) as $skill)
                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-1">
                                                    {{ $skill->name }}
                                                </span>
                                            @endforeach
                                            @if($expert->skills->count() > 3)
                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                    +{{ $expert->skills->count() - 3 }} more
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">No experts found in this category.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
