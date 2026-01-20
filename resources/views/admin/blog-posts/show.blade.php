<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Post Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Post: {{ $blogPost->title }}</h3>
                        <div>
                            <a href="{{ route('admin.blog-posts.images.index', $blogPost) }}" class="mr-2 px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600">
                                Manage Images
                            </a>
                            <a href="{{ route('admin.blog-posts.edit', $blogPost) }}" class="mr-2 px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">
                                Edit
                            </a>
                            <a href="{{ route('admin.blog-posts.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                Back to List
                            </a>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">ID</h4>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogPost->id }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Category</h4>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogPost->category->name }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Status</h4>
                            <p class="mt-1 text-sm">
                                @if($blogPost->published_at && $blogPost->published_at <= now())
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Published
                                    </span>
                                @elseif($blogPost->published_at && $blogPost->published_at > now())
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Scheduled
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Draft
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Slug</h4>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogPost->slug }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Created At</h4>
                            <p class="mt-1 text-sm text-gray-900">{{ $blogPost->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Published At</h4>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ $blogPost->published_at ? $blogPost->published_at->format('M d, Y H:i') : 'Not scheduled' }}
                            </p>
                        </div>
                    </div>

                    @if($blogPost->image)
                        <div class="mb-6">
                            <h4 class="text-sm font-medium text-gray-500 mb-2">Featured Image</h4>
                            <img src="{{ Storage::url($blogPost->image) }}" alt="{{ $blogPost->title }}" class="max-w-md rounded">
                        </div>
                    @endif

                    @if($blogPost->excerpt)
                        <div class="mb-6">
                            <h4 class="text-sm font-medium text-gray-500 mb-2">Excerpt</h4>
                            <p class="text-gray-900">{{ $blogPost->excerpt }}</p>
                        </div>
                    @endif

                    <div class="border-t border-gray-200 pt-6">
                        <h4 class="text-lg font-medium mb-4">Content</h4>
                        <div class="prose max-w-none">
                            {!! nl2br(e($blogPost->body)) !!}
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-6 mt-6">
                        <h4 class="text-lg font-medium mb-4">Gallery Images ({{ $blogPost->images->count() }} images)</h4>
                        @if($blogPost->images->count() > 0)
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                @foreach($blogPost->images as $image)
                                    <div class="border rounded-lg overflow-hidden">
                                        <img src="{{ Storage::url($image->image) }}" alt="{{ $image->caption ?? 'Blog image' }}" class="w-full h-32 object-cover">
                                        @if($image->caption)
                                            <div class="p-2">
                                                <p class="text-xs text-gray-600">{{ $image->caption }}</p>
                                            </div>
                                        @endif
                                        <div class="p-2 bg-gray-50 border-t text-center">
                                            <a href="{{ route('admin.blog-posts.images.edit', [$blogPost, $image]) }}"
                                               class="text-indigo-600 hover:text-indigo-900 text-sm mr-2">Edit</a>
                                            <form action="{{ route('admin.blog-posts.images.destroy', [$blogPost, $image]) }}"
                                                  method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900 text-sm"
                                                        onclick="return confirm('Delete this image?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">No additional images uploaded for this post.</p>
                            <a href="{{ route('admin.blog-posts.images.create', $blogPost) }}"
                               class="mt-2 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Add Images
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
