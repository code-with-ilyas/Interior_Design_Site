<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Testimonials
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('admin.testimonials.create') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded">
                    + Add Testimonial
                </a>
            </div>

            <div class="bg-white shadow rounded">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="p-3">Client</th>
                            <th class="p-3">Designation</th>
                            <th class="p-3">Order</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials as $t)
                            <tr class="border-t">
                                <td class="p-3">{{ $t->client_name }}</td>
                                <td class="p-3">{{ $t->designation }}</td>
                                <td class="p-3">{{ $t->sort_order }}</td>
                                <td class="p-3">
                                    <span class="px-2 py-1 text-xs rounded
                                        {{ $t->is_active ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                        {{ $t->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="p-3 flex gap-2">
                                    <a href="{{ route('testimonials.edit',$t) }}"
                                       class="px-3 py-1 bg-yellow-500 text-white rounded">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('testimonials.destroy',$t) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1 bg-red-600 text-white rounded"
                                                onclick="return confirm('Delete this testimonial?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-4 text-center text-gray-500">
                                    No testimonials found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
