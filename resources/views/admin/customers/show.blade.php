<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Customer Details</h3>
                        <div>
                            <a href="{{ route('admin.customers.edit', $customer) }}" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 mr-2">
                                Edit
                            </a>
                            <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <div class="mb-6">
                                <h4 class="text-xl font-semibold mb-2">{{ $customer->name }}</h4>
                                @if($customer->description)
                                    <p class="text-gray-600">{{ $customer->description }}</p>
                                @endif
                            </div>

                            <div class="mb-6">
                                <h5 class="text-lg font-medium mb-2">Logos</h5>
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                    @php
                                        $logos = json_decode($customer->logo, true);
                                    @endphp
                                    @if($logos && is_array($logos) && count($logos) > 0)
                                        @foreach($logos as $index => $logo)
                                            <div>
                                                <img src="{{ asset('storage/' . $logo) }}" alt="Logo {{ $index + 1 }}" class="w-full h-32 object-contain border rounded">
                                                <p class="mt-2 text-sm text-gray-600">Logo {{ $index + 1 }}</p>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-gray-500">No logos uploaded.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h5 class="text-lg font-medium mb-4">Customer Information</h5>
                                <dl class="space-y-2">
                                    <div>
                                        <dt class="font-medium text-gray-700">ID</dt>
                                        <dd class="ml-0">{{ $customer->id }}</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Name</dt>
                                        <dd class="ml-0">{{ $customer->name }}</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Created At</dt>
                                        <dd class="ml-0">{{ $customer->created_at->format('M d, Y H:i') }}</dd>
                                    </div>
                                    <div>
                                        <dt class="font-medium text-gray-700">Updated At</dt>
                                        <dd class="ml-0">{{ $customer->updated_at->format('M d, Y H:i') }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.customers.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            ← Back to Customers
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
