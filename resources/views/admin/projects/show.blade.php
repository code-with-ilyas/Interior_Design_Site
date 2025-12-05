<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Project Details</h3>
                        <div>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 mr-2">
                                Edit
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this project?');">
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
                                <h4 class="text-xl font-semibold mb-2">{{ $project->title }}</h4>
                                <p class="text-gray-600">{{ $project->short_description }}</p>
                            </div>

                            @if($project->cover_image)
                                <div class="mb-6">
                                    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="w-full h-auto rounded-lg">
                                </div>
                            @endif

                            <div class="mb-6">
                                <h5 class="text-lg font-medium mb-2">Description</h5>
                                <div class="prose max-w-none">
                                    {!! nl2br(e($project->long_description)) !!}
                                </div>
                            </div>

                            @if($project->projectImages->count() > 0)
                                <div class="mb-6">
                                    <h5 class="text-lg font-medium mb-2">Additional Images</h5>
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                        @foreach($project->projectImages as $image)
                                            <div>
                                                <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->caption }}" class="w-full h-48 object-cover rounded">
                                                @if($image->caption)
                                                    <p class="mt-2 text-sm text-gray-600">{{ $image->caption }}</p>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <h5 class="text-lg font-medium mb-2">Project Details</h5>
                                    <dl class="space-y-2">
                                        <div>
                                            <dt class="font-medium text-gray-700">Category</dt>
                                            <dd class="ml-0">{{ $project->projectCategory->name ?? 'N/A' }}</dd>
                                        </div>
                                        <div>
                                            <dt class="font-medium text-gray-700">Location</dt>
                                            <dd class="ml-0">{{ $project->location ?? 'N/A' }}</dd>
                                        </div>
                                        <div>
                                            <dt class="font-medium text-gray-700">Property Type</dt>
                                            <dd class="ml-0">{{ $project->property_type ?? 'N/A' }}</dd>
                                        </div>
                                        <div>
                                            <dt class="font-medium text-gray-700">Project Type</dt>
                                            <dd class="ml-0">{{ $project->project_type ?? 'N/A' }}</dd>
                                        </div>
                                        <div>
                                            <dt class="font-medium text-gray-700">Surface Area</dt>
                                            <dd class="ml-0">{{ $project->surface_area ?? 'N/A' }}</dd>
                                        </div>
                                        <div>
                                            <dt class="font-medium text-gray-700">Condition Before</dt>
                                            <dd class="ml-0">{{ $project->condition_before ?? 'N/A' }}</dd>
                                        </div>
                                    </dl>
                                </div>

                                <div>
                                    <h5 class="text-lg font-medium mb-2">Financial & Timeline</h5>
                                    <dl class="space-y-2">
                                        <div>
                                            <dt class="font-medium text-gray-700">Budget</dt>
                                            <dd class="ml-0">
                                                @if($project->budget)
                                                    {{ $project->cost_currency ?? '€' }}{{ number_format($project->budget, 2) }}
                                                @else
                                                    N/A
                                                @endif
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="font-medium text-gray-700">Duration</dt>
                                            <dd class="ml-0">
                                                @if($project->duration_weeks)
                                                    {{ $project->duration_weeks }} weeks
                                                @else
                                                    N/A
                                                @endif
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="font-medium text-gray-700">Completion Year</dt>
                                            <dd class="ml-0">{{ $project->completion_year ?? 'N/A' }}</dd>
                                        </div>
                                        <div>
                                            <dt class="font-medium text-gray-700">CO2 Avoided Per Year</dt>
                                            <dd class="ml-0">{{ $project->co2_avoided_per_year ?? 'N/A' }}</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <h5 class="text-lg font-medium mb-2">Parties Involved</h5>
                                    <dl class="space-y-2">
                                        <div>
                                            <dt class="font-medium text-gray-700">Client</dt>
                                            <dd class="ml-0">{{ $project->client_name ?? 'N/A' }}</dd>
                                        </div>
                                        <div>
                                            <dt class="font-medium text-gray-700">Architect</dt>
                                            <dd class="ml-0">{{ $project->architect_name ?? 'N/A' }}</dd>
                                        </div>
                                        <div>
                                            <dt class="font-medium text-gray-700">Contractor</dt>
                                            <dd class="ml-0">{{ $project->contractor_name ?? 'N/A' }}</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            @if($project->materials_used)
                                <div class="mb-6">
                                    <h5 class="text-lg font-medium mb-2">Materials Used</h5>
                                    <div class="prose max-w-none">
                                        {!! nl2br(e($project->materials_used)) !!}
                                    </div>
                                </div>
                            @endif

                            @if($project->challenges)
                                <div class="mb-6">
                                    <h5 class="text-lg font-medium mb-2">Challenges</h5>
                                    <div class="prose max-w-none">
                                        {!! nl2br(e($project->challenges)) !!}
                                    </div>
                                </div>
                            @endif

                            @if($project->result_highlights)
                                <div class="mb-6">
                                    <h5 class="text-lg font-medium mb-2">Result Highlights</h5>
                                    <div class="prose max-w-none">
                                        {!! nl2br(e($project->result_highlights)) !!}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h5 class="text-lg font-medium mb-4">Experts</h5>
                                @if($project->experts->count() > 0)
                                    <ul class="space-y-3">
                                        @foreach($project->experts as $expert)
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    @if($expert->image)
                                                        <img src="{{ asset('storage/' . $expert->image) }}" alt="{{ $expert->name }}" class="h-10 w-10 rounded-full object-cover">
                                                    @else
                                                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                            <span class="text-gray-600 font-medium">{{ substr($expert->name, 0, 1) }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="ml-3">
                                                    <p class="font-medium text-gray-900">{{ $expert->name }}</p>
                                                    @if($expert->pivot->role)
                                                        <p class="text-sm text-gray-500">{{ $expert->pivot->role }}</p>
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-gray-500">No experts assigned to this project.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            ← Back to Projects
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
