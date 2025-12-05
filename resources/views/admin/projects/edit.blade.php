<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Edit Project</h3>

                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">Whoops! Something went wrong.</div>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="project_category_id" class="block text-sm font-medium text-gray-700">Category *</label>
                                <select name="project_category_id" id="project_category_id" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('project_category_id', $project->project_category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div class="md:col-span-2">
                                <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description</label>
                                <textarea name="short_description" id="short_description" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('short_description', $project->short_description) }}</textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label for="long_description" class="block text-sm font-medium text-gray-700">Long Description</label>
                                <textarea name="long_description" id="long_description" rows="6"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('long_description', $project->long_description) }}</textarea>
                            </div>

                            <div>
                                <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                                @if($project->cover_image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="h-32 w-32 object-cover rounded">
                                    </div>
                                @endif
                                <input type="file" name="cover_image" id="cover_image" accept="image/*"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <p class="mt-1 text-sm text-gray-500">Upload a new cover image (JPG, PNG, GIF) - Max 2MB</p>
                            </div>

                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <input type="text" name="location" id="location" value="{{ old('location', $project->location) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="property_type" class="block text-sm font-medium text-gray-700">Property Type</label>
                                <input type="text" name="property_type" id="property_type" value="{{ old('property_type', $project->property_type) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="project_type" class="block text-sm font-medium text-gray-700">Project Type</label>
                                <input type="text" name="project_type" id="project_type" value="{{ old('project_type', $project->project_type) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="surface_area" class="block text-sm font-medium text-gray-700">Surface Area</label>
                                <input type="text" name="surface_area" id="surface_area" value="{{ old('surface_area', $project->surface_area) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="condition_before" class="block text-sm font-medium text-gray-700">Condition Before</label>
                                <input type="text" name="condition_before" id="condition_before" value="{{ old('condition_before', $project->condition_before) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="budget" class="block text-sm font-medium text-gray-700">Budget</label>
                                <input type="number" name="budget" id="budget" value="{{ old('budget', $project->budget) }}" min="0" step="0.01"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="cost_currency" class="block text-sm font-medium text-gray-700">Currency</label>
                                <input type="text" name="cost_currency" id="cost_currency" value="{{ old('cost_currency', $project->cost_currency ?? '€') }}" maxlength="10"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="duration_weeks" class="block text-sm font-medium text-gray-700">Duration (weeks)</label>
                                <input type="number" name="duration_weeks" id="duration_weeks" value="{{ old('duration_weeks', $project->duration_weeks) }}" min="0"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="completion_year" class="block text-sm font-medium text-gray-700">Completion Year</label>
                                <input type="number" name="completion_year" id="completion_year" value="{{ old('completion_year', $project->completion_year) }}" min="1900" max="{{ date('Y') + 5 }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="co2_avoided_per_year" class="block text-sm font-medium text-gray-700">CO2 Avoided Per Year</label>
                                <input type="text" name="co2_avoided_per_year" id="co2_avoided_per_year" value="{{ old('co2_avoided_per_year', $project->co2_avoided_per_year) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="client_name" class="block text-sm font-medium text-gray-700">Client Name</label>
                                <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $project->client_name) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="architect_name" class="block text-sm font-medium text-gray-700">Architect Name</label>
                                <input type="text" name="architect_name" id="architect_name" value="{{ old('architect_name', $project->architect_name) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label for="contractor_name" class="block text-sm font-medium text-gray-700">Contractor Name</label>
                                <input type="text" name="contractor_name" id="contractor_name" value="{{ old('contractor_name', $project->contractor_name) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div class="md:col-span-2">
                                <label for="materials_used" class="block text-sm font-medium text-gray-700">Materials Used</label>
                                <textarea name="materials_used" id="materials_used" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('materials_used', $project->materials_used) }}</textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label for="challenges" class="block text-sm font-medium text-gray-700">Challenges</label>
                                <textarea name="challenges" id="challenges" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('challenges', $project->challenges) }}</textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label for="result_highlights" class="block text-sm font-medium text-gray-700">Result Highlights</label>
                                <textarea name="result_highlights" id="result_highlights" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('result_highlights', $project->result_highlights) }}</textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label for="images" class="block text-sm font-medium text-gray-700">Additional Images</label>
                                <input type="file" name="images[]" id="images" accept="image/*" multiple
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <p class="mt-1 text-sm text-gray-500">Upload additional project images (JPG, PNG, GIF) - Max 2MB each</p>

                                @if($project->projectImages->count() > 0)
                                    <div class="mt-4">
                                        <h4 class="text-sm font-medium text-gray-700 mb-2">Current Images:</h4>
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                            @foreach($project->projectImages as $image)
                                                <div class="relative group">
                                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->caption }}" class="h-32 w-full object-cover rounded">
                                                    <button type="button"
                                                            data-project-id="{{ $project->id }}"
                                                            data-image-id="{{ $image->id }}"
                                                            class="delete-image-btn absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Experts</label>
                                <div class="mt-2 space-y-2">
                                    @foreach($experts as $expert)
                                        <div class="flex items-center">
                                            <input type="checkbox" name="experts[]" value="{{ $expert->id }}" id="expert_{{ $expert->id }}"
                                                {{ in_array($expert->id, old('experts', $projectExperts)) ? 'checked' : '' }}
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <label for="expert_{{ $expert->id }}" class="ml-2 block text-sm text-gray-900">
                                                {{ $expert->name }}
                                            </label>
                                            <input type="text" name="expert_roles[]" placeholder="Role"
                                                value="{{ old('expert_roles.' . $loop->index, $expertRoles[$expert->id] ?? '') }}"
                                                class="ml-2 block w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end">
                            <a href="{{ route('admin.projects.index') }}" class="mr-3 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Update Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listeners to delete buttons
            document.querySelectorAll('.delete-image-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const projectId = this.getAttribute('data-project-id');
                    const imageId = this.getAttribute('data-image-id');

                    deleteImage(projectId, imageId, this);
                });
            });
        });

        function deleteImage(projectId, imageId, button) {
            if (confirm('Are you sure you want to delete this image?')) {
                fetch(`/admin/projects/${projectId}/images/${imageId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        button.closest('.relative').remove();
                    } else {
                        alert('Error deleting image');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error deleting image');
                });
            }
        }
    </script>
</x-app-layout>
