<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skill Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Skill Details</h3>
                        <div>
                            @can('edit skills')
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 mr-2">
                                    Edit
                                </a>
                            @endcan
                            @can('delete skills')
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this skill? This will remove it from all experts.')">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-2 sm:grid-cols-2">
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">ID</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $skill->id }}</dd>
                            </div>

                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Name</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $skill->name }}</dd>
                            </div>

                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Created At</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $skill->created_at->format('M d, Y H:i:s') }}</dd>
                            </div>

                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Updated At</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $skill->updated_at->format('M d, Y H:i:s') }}</dd>
                            </div>

                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500">Experts with this skill</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    @if($skill->experts->count() > 0)
                                        <div class="mt-2">
                                            <ul class="list-disc pl-5 space-y-1">
                                                @foreach($skill->experts as $expert)
                                                    <li>
                                                        <a href="{{ route('admin.experts.show', $expert) }}" class="text-blue-600 hover:text-blue-800">
                                                            {{ $expert->name }}
                                                        </a>
                                                        @if($expert->designation)
                                                            <span class="text-gray-500">({{ $expert->designation }})</span>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <span class="text-gray-500">No experts have this skill assigned</span>
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.skills.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            ← Back to Skills
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
