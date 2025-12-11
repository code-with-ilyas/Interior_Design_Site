<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expert Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Expert Details</h3>
                        <div>
                            @can('edit experts')
                                <a href="{{ route('admin.experts.edit', $expert) }}" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 mr-2">
                                    Edit
                                </a>
                            @endcan
                            @can('delete experts')
                                <form action="{{ route('admin.experts.destroy', $expert) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this expert?')">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                @if($expert->image)
                                    <img src="{{ asset('storage/' . $expert->image) }}" alt="{{ $expert->name }}" class="w-full rounded-lg object-cover">
                                @else
                                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-64 flex items-center justify-center">
                                        <span class="text-gray-500">No Image</span>
                                    </div>
                                @endif

                                <h4 class="mt-4 text-lg font-medium">{{ $expert->name }}</h4>
                                <p class="text-gray-600">{{ $expert->designation ?? 'No designation' }}</p>
                                <p class="text-gray-500 text-sm">{{ $expert->company ?? 'No company' }}</p>
                                
                                @if($expert->company_logo)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $expert->company_logo) }}" alt="{{ $expert->company }} Logo" class="h-10 w-auto">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="text-md font-medium mb-3">Details</h4>

                                <dl class="grid grid-cols-1 gap-x-4 gap-y-2 sm:grid-cols-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Experience</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            @if($expert->experience)
                                                {{ $expert->experience }} years
                                            @else
                                                Not specified
                                            @endif
                                        </dd>
                                    </div>

                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Category</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            @if($expert->category)
                                                {{ $expert->category->name }}
                                            @else
                                                Not specified
                                            @endif
                                        </dd>
                                    </div>

                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Created At</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $expert->created_at->format('M d, Y') }}</dd>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Bio</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            @if($expert->bio)
                                                {{ $expert->bio }}
                                            @else
                                                No bio available
                                            @endif
                                        </dd>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Skills</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            @if($expert->skills->count() > 0)
                                                <div class="flex flex-wrap gap-2">
                                                    @foreach($expert->skills as $skill)
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                            {{ $skill->name }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="text-gray-500">No skills assigned</span>
                                            @endif
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            @if($expert->projects->count() > 0)
                                <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                                    <h4 class="text-md font-medium mb-3">Projects</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        @foreach($expert->projects as $project)
                                            <div class="border border-gray-200 rounded p-3">
                                                <h5 class="font-medium">{{ $project->name }}</h5>
                                                <p class="text-sm text-gray-600 mt-1">{{ $project->pivot->role }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.experts.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            ← Back to Experts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
