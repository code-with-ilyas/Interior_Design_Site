<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quote Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Quote #{{ $quote->id }}</h3>
                        <div>
                            @if($quote->isPending())
                                <form action="{{ route('admin.quotes.approve', $quote) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mr-2">Approve</button>
                                </form>
                                <form action="{{ route('admin.quotes.reject', $quote) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Reject</button>
                                </form>
                            @elseif($quote->isApproved())
                                <span class="px-4 py-2 bg-green-100 text-green-800 rounded">Approved</span>
                            @else
                                <span class="px-4 py-2 bg-red-100 text-red-800 rounded">Rejected</span>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-md font-medium mb-3">Personal Information</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">First Name</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->first_name }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Last Name</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->name }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->email }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->phone }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Company</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->company ?? 'N/A' }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-md font-medium mb-3">Address Information</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Address</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->address ?? 'N/A' }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Postal Code</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->postal_code ?? 'N/A' }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">City</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->city ?? 'N/A' }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Country</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->country ?? 'N/A' }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Cities</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->cities ?? 'N/A' }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <h4 class="text-md font-medium mb-3">Project Details</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Start Date Preference</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->start_date_preference ? $quote->start_date_preference->format('M d, Y') : 'N/A' }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Budget Range</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->budget_range ?? 'N/A' }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Property Type</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->property_type ?? 'N/A' }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Renovation Type</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->renovation_type ?? 'N/A' }}</dd>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Project Description</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->project_description ?? 'N/A' }}</dd>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Message</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->mesage ?? 'N/A' }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <h4 class="text-md font-medium mb-3">Additional Information</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">GDPR Consent</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->gdpr_consent ? 'Yes' : 'No' }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Marketing Consent</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->marketing_consent ? 'Yes' : 'No' }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            @if($quote->status === 'pending')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                            @elseif($quote->status === 'approved')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                                            @endif
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Created At</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $quote->created_at->format('M d, Y H:i') }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.quotes.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Back to Quotes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
