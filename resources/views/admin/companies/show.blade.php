<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Company Details</h1>
                        <div class="space-x-2">
                            <a href="{{ route('admin.companies.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Back to Companies</a>
                            <a href="{{ route('admin.companies.edit', $company) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold text-gray-700 mb-2">Company Information</h2>

                            <div class="mb-3">
                                <p class="text-xs text-gray-500 uppercase tracking-wider">Name</p>
                                <p class="font-medium">{{ $company->name }}</p>
                            </div>

                            <div class="mb-3">
                                <p class="text-xs text-gray-500 uppercase tracking-wider">Website URL</p>
                                @if($company->website_url)
                                    <a href="{{ $company->website_url }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline">{{ $company->website_url }}</a>
                                @else
                                    <p class="font-medium">-</p>
                                @endif
                            </div>

                            <div class="mb-3">
                                <p class="text-xs text-gray-500 uppercase tracking-wider">Created At</p>
                                <p class="font-medium">{{ $company->created_at->format('M d, Y H:i') }}</p>
                            </div>

                            <div class="mb-3">
                                <p class="text-xs text-gray-500 uppercase tracking-wider">Updated At</p>
                                <p class="font-medium">{{ $company->updated_at->format('M d, Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="mb-4 flex flex-col items-center justify-start">
                            <h2 class="text-lg font-semibold text-gray-700 mb-2">Logo</h2>
                            @if($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" class="w-48 h-48 object-contain border border-gray-300 rounded-md">
                            @else
                                <p class="text-gray-500 italic">No logo uploaded</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-700 mb-3">Actions</h3>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.companies.edit', $company) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('admin.companies.destroy', $company) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this company?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
