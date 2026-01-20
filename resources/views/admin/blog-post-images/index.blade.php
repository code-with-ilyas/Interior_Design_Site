<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Blog Post Images') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-lg font-medium">Images for "{{ $blogPost->title }}"</h3>
                            <p class="text-sm text-gray-500">Manage additional images for this blog post</p>
                        </div>
                        <a href="{{ route('admin.blog-posts.images.create', $blogPost) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Add New Image
                        </a>
                    </div>

                    <div class="mb-4">
                        <a href="{{ route('admin.blog-posts.show', $blogPost) }}" class="text-blue-600 hover:text-blue-800">
                            ← Back to Post
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($images->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($images as $image)
                                <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm">
                                    <div class="aspect-square">
                                        <img src="{{ Storage::url($image->image) }}"
                                             alt="{{ $image->caption ?? 'Blog image' }}"
                                             class="w-full h-full object-cover">
                                    </div>
                                    @if($image->caption)
                                        <div class="p-3">
                                            <p class="text-sm text-gray-600">{{ $image->caption }}</p>
                                        </div>
                                    @endif
                                    <div class="p-3 bg-white border-t flex justify-between items-center">
                                        <span class="text-xs text-gray-500">
                                            Added {{ $image->created_at->diffForHumans() }}
                                        </span>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.blog-posts.images.edit', [$blogPost, $image]) }}"
                                               class="text-indigo-600 hover:text-indigo-900 text-sm">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.blog-posts.images.destroy', [$blogPost, $image]) }}"
                                                  method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900 text-sm"
                                                        onclick="return confirm('Are you sure you want to delete this image?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            {{ $images->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No images</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by adding a new image to this blog post.</p>
                            <div class="mt-6">
                                <a href="{{ route('admin.blog-posts.images.create', $blogPost) }}"
                                   class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Add Image
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
