<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project Category Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Project Category Details</h3>
                        <div>
                            <a href="{{ route('admin.project-categories.edit', $projectCategory) }}" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 mr-2">
                                Edit
                            </a>
                            <form action="{{ route('admin.project-categories.destroy', $projectCategory) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-xl font-semibold mb-4">{{ $projectCategory->name }}</h4>

                            <dl class="space-y-4">
                                <div>
                                    <dt class="font-medium text-gray-700">Name</dt>
                                    <dd class="mt-1 text-gray-900">{{ $projectCategory->name }}</dd>
                                </div>

                                <div>
                                    <dt class="font-medium text-gray-700">Slug</dt>
                                    <dd class="mt-1 text-gray-900">{{ $projectCategory->slug }}</dd>
                                </div>

                                <div>
                                    <dt class="font-medium text-gray-700">Created At</dt>
                                    <dd class="mt-1 text-gray-900">{{ $projectCategory->created_at->format('M d, Y H:i') }}</dd>
                                </div>

                                <div>
                                    <dt class="font-medium text-gray-700">Updated At</dt>
                                    <dd class="mt-1 text-gray-900">{{ $projectCategory->updated_at->format('M d, Y H:i') }}</dd>
                                </div>
                            </dl>
                        </div>

                        <div>
                            <h4 class="text-lg font-medium mb-4">Projects in this Category</h4>

                            @if($projectCategory->projects->count() > 0)
                                <ul class="border rounded-lg divide-y">
                                    @foreach($projectCategory->projects as $project)
                                        <li class="p-3 hover:bg-gray-50">
                                            <a href="{{ route('admin.projects.show', $project) }}" class="text-blue-600 hover:text-blue-800">
                                                {{ $project->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500">No projects in this category yet.</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.project-categories.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            ← Back to Categories
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
