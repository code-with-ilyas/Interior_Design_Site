<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">Testimonials</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.testimonials.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Testimonial</a>
            </div>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Designation</th>
                            
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($testimonials as $testimonial)
                            <tr>
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 flex items-center gap-2">
                                    @if($testimonial->client_image)
                                        <img src="{{ asset('storage/'.$testimonial->client_image) }}" class="w-10 h-10 rounded-full object-cover" alt="Client">
                                    @endif
                                    <span>{{ $testimonial->client_name }}</span>
                                </td>
                                <td class="px-6 py-4">{{ $testimonial->designation }}</td>
                               
                                <td class="px-6 py-4 flex gap-2">
                                 <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Edit</a>

                                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($testimonials->isEmpty())
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No Testimonials Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
