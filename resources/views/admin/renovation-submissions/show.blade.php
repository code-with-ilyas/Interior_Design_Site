<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Renovation Submission Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Submission #{{ $submission->id }}</h3>
                        <div>
                            <span class="px-4 py-2 rounded mr-2
                                @if($submission->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($submission->status === 'reviewed') bg-blue-100 text-blue-800
                                @else bg-green-100 text-green-800
                                @endif">
                                {{ ucfirst($submission->status) }}
                            </span>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-4 px-4 py-2 bg-red-100 text-red-800 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Intent & Category Information -->
                        <div>
                            <h4 class="text-md font-medium mb-3">Request Information</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Intent</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            @if($intent)
                                                <i class="fas {{ $intent->icon() }} mr-1"></i>
                                                {{ $intent->label() }}
                                            @else
                                                {{ $submission->intent }}
                                            @endif
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Category</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            @if($category)
                                                <i class="fas {{ $category->icon() }} mr-1"></i>
                                                {{ $category->label() }}
                                            @else
                                                {{ $submission->category_slug }}
                                            @endif
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Submitted On</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->created_at->format('M d, Y H:i') }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">IP Address</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->ip_address ?? 'N/A' }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                        <!-- Personal Information -->
                        <div>
                            <h4 class="text-md font-medium mb-3">Contact Information</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">First Name</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->first_name }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Last Name</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->last_name }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            <a href="mailto:{{ $submission->email }}" class="text-blue-600 hover:text-blue-800">
                                                {{ $submission->email }}
                                            </a>
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            @if($submission->phone)
                                                <a href="tel:{{ $submission->phone }}" class="text-blue-600 hover:text-blue-800">
                                                    {{ $submission->phone }}
                                                </a>
                                            @else
                                                N/A
                                            @endif
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>

                        <!-- Address Information -->
                        @if($submission->address || $submission->city || $submission->postal_code)
                        <div class="md:col-span-2">
                            <h4 class="text-md font-medium mb-3">Address Information</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <dl class="grid grid-cols-1 md:grid-cols-3 gap-x-4 gap-y-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Address</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->address ?? 'N/A' }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">City</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->city ?? 'N/A' }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Postal Code</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->postal_code ?? 'N/A' }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        @endif

                        <!-- Form Responses -->
                        <div class="md:col-span-2">
                            <h4 class="text-md font-medium mb-3">Form Responses</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                @if($category && !empty($formData))
                                    <dl class="grid grid-cols-1 gap-x-4 gap-y-4">
                                        @foreach($formData as $stepNumber => $response)
                                            @php
                                                $step = $category->getStep($stepNumber);
                                            @endphp
                                            @if($step)
                                                <div class="border-b border-gray-200 pb-3 last:border-b-0">
                                                    <dt class="text-sm font-medium text-gray-700 mb-1">
                                                        Step {{ $stepNumber }}: {{ $step['title'] }}
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900">
                                                        @if(is_array($response))
                                                            <ul class="list-disc list-inside">
                                                                @foreach($response as $value)
                                                                    @php
                                                                        $option = collect($step['options'])->firstWhere('value', $value);
                                                                    @endphp
                                                                    <li>{{ $option['label'] ?? $value }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            @php
                                                                $option = collect($step['options'])->firstWhere('value', $response);
                                                            @endphp
                                                            @if($option)
                                                                {{ $option['label'] }}
                                                            @else
                                                                {{ $response }}
                                                            @endif
                                                        @endif
                                                    </dd>
                                                </div>
                                            @else
                                                <div class="border-b border-gray-200 pb-3 last:border-b-0">
                                                    <dt class="text-sm font-medium text-gray-700 mb-1">
                                                        Step {{ $stepNumber }}
                                                    </dt>
                                                    <dd class="mt-1 text-sm text-gray-900">
                                                        @if(is_array($response))
                                                            {{ implode(', ', $response) }}
                                                        @else
                                                            {{ $response }}
                                                        @endif
                                                    </dd>
                                                </div>
                                            @endif
                                        @endforeach
                                    </dl>
                                @else
                                    <p class="text-sm text-gray-500">No form responses available.</p>
                                @endif
                            </div>
                        </div>

                        <!-- Status Update Form -->
                        <div class="md:col-span-2">
                            <h4 class="text-md font-medium mb-3">Update Status</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <form action="{{ route('admin.renovation-submissions.update', $submission) }}" method="POST" class="flex items-end space-x-4">
                                    @csrf
                                    @method('PATCH')

                                    <div class="flex-1">
                                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                        <select name="status" id="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="pending" {{ $submission->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="reviewed" {{ $submission->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                            <option value="completed" {{ $submission->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                        Update Status
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex space-x-2">
                        <a href="{{ route('admin.renovation-submissions.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            <i class="fas fa-arrow-left mr-1"></i> Back to Submissions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
