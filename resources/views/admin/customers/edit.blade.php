<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Header + Action -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Edit Customer</h3>
                        <a href="{{ route('admin.customers.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Back to Customers
                        </a>
                    </div>

                    <!-- Success / Error Messages -->
                    @if(session('success'))
                        <div class="mb-4">
                            <div class="font-medium text-green-600">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">Whoops! Something went wrong.</div>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-6">

                            <!-- Customer Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Customer Name *</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description *</label>
                                <textarea name="description" id="description" rows="4" required
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $customer->description) }}</textarea>
                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="mt-6 flex items-center justify-end gap-3">
                            <a href="{{ route('admin.customers.index') }}"
                               class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Update Customer
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
