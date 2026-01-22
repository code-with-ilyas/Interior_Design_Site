<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Edit Company</h1>
                        <a href="{{ route('admin.companies.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Back to Companies</a>
                    </div>

                    @if(session('error'))
                        <div class="mb-4 px-4 py-2 bg-red-100 text-red-800 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.companies.update', $company) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Company Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $company->name) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="website_url" class="block text-gray-700 font-bold mb-2">Website URL</label>
                            <input type="url" name="website_url" id="website_url" value="{{ old('website_url', $company->website_url) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('website_url')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="logo" class="block text-gray-700 font-bold mb-2">Logo</label>
                            @if($company->logo)
                                <div class="mb-2">
                                    <p class="text-gray-600 text-sm">Current Logo:</p>
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" class="w-32 h-32 object-contain border border-gray-300 rounded-md">
                                </div>
                            @endif
                            <input type="file" name="logo" id="logo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" accept="image/*">
                            <p class="text-gray-600 text-sm mt-1">Allowed formats: jpeg, png, jpg, gif, svg. Max size: 2MB. Leave blank to keep current logo.</p>
                            @error('logo')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('admin.companies.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline">
                                Update Company
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
