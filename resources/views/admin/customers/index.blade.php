<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Our Customers</h2>
            <a href="{{ route('admin.customers.create') }}" class="px-4 py-2 bg-green-500 text-dark rounded hover:bg-green-600 text-sm">
                Add Customer
            </a>
        </div>
    </x-slot>

    <section id="customers-sec" class="clients py-6 px-4 bg-gray-100">
        <div class="columns grid grid-cols-1 md:grid-cols-3 gap-4">
            @forelse($customers as $customer)
            <div class="column fade-in border rounded p-4 bg-white shadow-sm">

                {{-- Name --}}
                <h6 class="text-gray-500 font-semibold mb-1">Name</h6>
                <p class="text-gray-800 font-medium mb-3">{{ $customer->name }}</p>

                {{-- Description --}}
                <h6 class="text-gray-500 font-semibold mb-1">Description</h6>
                <p class="text-gray-800 text-sm mb-3">{{ $customer->description }}</p>

                {{-- Action buttons --}}
                <div class="flex justify-center gap-2">
                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="px-3 py-1 bg-blue-500 text-dark rounded text-sm hover:bg-blue-600">Edit</a>

                    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-500 text-dark rounded text-sm hover:bg-red-600">Delete</button>
                    </form>
                </div>

            </div>
            @empty
            <p class="text-gray-700 col-span-3 text-center">No customers found.</p>
            @endforelse
        </div>
    </section>
</x-app-layout>
