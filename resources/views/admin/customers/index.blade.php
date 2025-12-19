<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Header + Action -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Customer Management</h3>
                        <a href="{{ route('admin.customers.create') }}"
                           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Add New Customer
                        </a>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="mb-4">
                            <div class="font-medium text-green-600">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($customers as $customer)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $customer->name }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-500">
                                                {{ Str::limit($customer->description, 80) }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('admin.customers.edit', $customer->id) }}"
                                               class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.customers.destroy', $customer->id) }}"
                                                  method="POST"
                                                  class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3"
                                            class="px-6 py-4 text-center text-sm text-gray-500">
                                            No customers found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if(method_exists($customers, 'links'))
                        <div class="mt-6">
                            {{ $customers->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
