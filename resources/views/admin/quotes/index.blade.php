<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quotes Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Quotes</h3>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.quotes.index') }}" class="px-3 py-1 text-sm rounded {{ !request()->routeIs('admin.quotes.pending', 'admin.quotes.approved', 'admin.quotes.rejected') ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">All</a>
                            <a href="{{ route('admin.quotes.pending') }}" class="px-3 py-1 text-sm rounded {{ request()->routeIs('admin.quotes.pending') ? 'bg-yellow-500 text-white' : 'bg-gray-200' }}">Pending</a>
                            <a href="{{ route('admin.quotes.approved') }}" class="px-3 py-1 text-sm rounded {{ request()->routeIs('admin.quotes.approved') ? 'bg-green-500 text-white' : 'bg-gray-200' }}">Approved</a>
                            <a href="{{ route('admin.quotes.rejected') }}" class="px-3 py-1 text-sm rounded {{ request()->routeIs('admin.quotes.rejected') ? 'bg-red-500 text-white' : 'bg-gray-200' }}">Rejected</a>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">S.No.</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Full Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($quotes as $quote)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $quote->first_name }} {{ $quote->last_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $quote->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $quote->phone }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($quote->status === 'pending')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                            @elseif($quote->status === 'approved')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $quote->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('admin.quotes.show', $quote) }}" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                            @if($quote->isPending())
                                                <form action="{{ route('admin.quotes.approve', $quote) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="text-green-600 hover:text-green-900 mr-3">Approve</button>
                                                </form>
                                                <form action="{{ route('admin.quotes.reject', $quote) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Reject</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                                            No quotes found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $quotes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
