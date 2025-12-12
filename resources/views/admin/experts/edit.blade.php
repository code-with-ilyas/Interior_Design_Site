<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Expert') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Edit Expert</h3>

                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">Whoops! Something went wrong.</div>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.experts.update', $expert) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name *</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $expert->name) }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="designation" class="block text-sm font-medium text-gray-700">Designation</label>
                                <input type="text" name="designation" id="designation" value="{{ old('designation', $expert->designation) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                                <input type="text" name="company" id="company" value="{{ old('company', $expert->company) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="company_url" class="block text-sm font-medium text-gray-700">Company URL</label>
                                <input type="url" name="company_url" id="company_url" value="{{ old('company_url', $expert->company_url) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <p class="mt-1 text-sm text-gray-500">Enter the company website URL (e.g. https://example.com)</p>
                            </div>

                            <div>
                                <label for="experience" class="block text-sm font-medium text-gray-700">Experience (years)</label>
                                <input type="number" name="experience" id="experience" value="{{ old('experience', $expert->experience) }}" min="0"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div class="md:col-span-2">
                                <label for="image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                                @if($expert->image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $expert->image) }}" alt="{{ $expert->name }}" class="h-20 w-20 rounded-full object-cover">
                                    </div>
                                @endif
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <p class="mt-1 text-sm text-gray-500">Upload a new profile image (JPG, PNG, GIF) - Max 2MB</p>
                            </div>

                            <div class="md:col-span-2">
                                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                                <textarea name="bio" id="bio" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('bio', $expert->bio) }}</textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label for="company_logo" class="block text-sm font-medium text-gray-700">Company Logo</label>
                                @if($expert->company_logo)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $expert->company_logo) }}" alt="{{ $expert->company }} Logo" class="h-10 w-auto">
                                    </div>
                                @endif
                                <input type="file" name="company_logo" id="company_logo" accept="image/*"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <p class="mt-1 text-sm text-gray-500">Upload a new company logo (JPG, PNG, GIF, SVG) - Max 2MB</p>
                            </div>

                            <div class="md:col-span-2">
                                <x-tom-select
                                    name="category_id"
                                    label="Category"
                                    :options="$categories->pluck('name', 'id')"
                                    :selected="old('category_id', $expert->category_id)"
                                    :multiple="false"
                                    placeholder="Select a category"
                                    helpText="Select a category for this expert"
                                />
                            </div>

                            <div class="md:col-span-2">
                                <x-tom-select
                                    name="skills"
                                    label="Skills"
                                    :options="$skills->pluck('name', 'id')"
                                    :selected="old('skills', $expertSkills)"
                                    helpText="Start typing to search skills"
                                />
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end">
                            <a href="{{ route('admin.experts.index') }}" class="mr-3 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Update Expert
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
