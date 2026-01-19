<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Category Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Category: {{ $blogCategory->name }}</h3>
                        <div>
                            <a href="{{ route('admin.blog-categories.edit', $blogCategory) }}" class="mr-2 px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">
                                Edit
                            </a>
                            <a href="{{ route('admin.blog-categories.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                Back to List
                            </a>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">ID</h4>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogCategory->id }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Name</h4>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogCategory->name }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Slug</h4>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogCategory->slug }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Created At</h4>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogCategory->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Updated At</h4>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogCategory->updated_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Posts Count</h4>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogCategory->posts->count() }}</p>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-6">
                        <h4 class="text-lg font-medium mb-4">Associated Blog Posts</h4>
                        @if($blogCategory->posts->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($blogCategory->posts as $post)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $post->title }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Not published' }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="{{ route('admin.blog-posts.show', $post) }}" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                                    <a href="{{ route('admin.blog-posts.edit', $post) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-gray-500">No blog posts found in this category.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
