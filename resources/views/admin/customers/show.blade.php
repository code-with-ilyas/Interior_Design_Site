<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Customer Details</h3>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.customers.edit', $customer) }}" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">
                                Edit
                            </a>
                            <a href="{{ route('admin.customers.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-500">ID</h4>
                            <p class="mt-1 text-sm text-gray-900">{{ $customer->id }}</p>
                        </div>

                        <div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-500">Name</h4>
                            <p class="mt-1 text-sm text-gray-900">{{ $customer->name }}</p>
                        </div>

                        <div class="mb-4 md:col-span-2">
                            <h4 class="text-sm font-medium text-gray-500">Description</h4>
                            <p class="mt-1 text-sm text-gray-900">{{ $customer->description }}</p>
                        </div>

                        <div class="mb-4 md:col-span-2">
                            <h4 class="text-sm font-medium text-gray-500">Logos</h4>
                            <div class="mt-2 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                @php
                                    $logos = json_decode($customer->logo, true);
                                @endphp
                                @if($logos && is_array($logos))
                                    @foreach($logos as $index => $logo)
                                        <div class="flex flex-col items-center">
                                            <img src="{{ asset('storage/' . $logo) }}" alt="Logo {{ $index + 1 }}" class="h-16 w-auto object-contain border rounded">
                                            <span class="text-xs text-gray-500 mt-1">Logo {{ $index + 1 }}</span>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-sm text-gray-500">No logos uploaded.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
