<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Blog Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.blog-posts.update', $blogPost) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <div class="mb-4">
                                    <label for="blog_category_id" class="block text-sm font-medium text-gray-700">Category *</label>
                                    <select name="blog_category_id" id="blog_category_id"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            required>
                                        <option value="">Select a category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('blog_category_id', $blogPost->blog_category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('blog_category_id')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                                    <input type="text" name="title" id="title" value="{{ old('title', $blogPost->title) }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                           required>
                                    @error('title')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                                    <input type="text" name="slug" id="slug" value="{{ old('slug', $blogPost->slug) }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                           placeholder="Leave blank to auto-generate from title">
                                    @error('slug')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="published_at" class="block text-sm font-medium text-gray-700">Publish Date</label>
                                    <input type="datetime-local" name="published_at" id="published_at"
                                           value="{{ old('published_at', $blogPost->published_at ? $blogPost->published_at->format('Y-m-d\TH:i') : '') }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @error('published_at')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <div class="mb-4">
                                    <label for="image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                                    @if($blogPost->image)
                                        <div class="mb-2">
                                            <img src="{{ Storage::url($blogPost->image) }}" alt="Current image" class="w-32 h-32 object-cover rounded">
                                        </div>
                                    @endif
                                    <input type="file" name="image" id="image"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                           accept="image/*">
                                    @error('image')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt</label>
                                    <textarea name="excerpt" id="excerpt" rows="4"
                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                              placeholder="Brief summary of the post...">{{ old('excerpt', $blogPost->excerpt) }}</textarea>
                                    @error('excerpt')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="body" class="block text-sm font-medium text-gray-700">Content *</label>
                            <textarea name="body" id="body" rows="15"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                      required placeholder="Write your blog post content here...">{{ old('body', $blogPost->body) }}</textarea>
                            @error('body')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="additional_images" class="block text-sm font-medium text-gray-700">Add More Images</label>
                            <input type="file" name="additional_images[]" id="additional_images" multiple
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   accept="image/*">
                            <p class="mt-1 text-sm text-gray-500">Add more images to the gallery (existing images shown below)</p>
                            @error('additional_images')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @error('additional_images.*')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($blogPost->images->count() > 0)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Current Additional Images</label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 mt-2">
                                    @foreach($blogPost->images as $image)
                                        <div class="relative">
                                            <img src="{{ Storage::url($image->image) }}" alt="Blog image" class="w-full h-24 object-cover rounded">
                                            <a href="{{ route('admin.blog-posts.images.edit', [$blogPost, $image]) }}"
                                               class="absolute top-1 right-1 bg-white rounded-full p-1 text-xs">
                                                Edit
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.blog-posts.index') }}" class="mr-4 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                Cancel
                            </a>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Update Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
