<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Testimonial
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded p-6">

                <form method="POST"
                      action="{{ route('admin.testimonials.update',$testimonial) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-1">Client Name</label>
                        <input type="text" name="client_name"
                               value="{{ $testimonial->client_name }}"
                               class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Designation</label>
                        <input type="text" name="designation"
                               value="{{ $testimonial->designation }}"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Testimonial Text</label>
                        <textarea name="testimonial_text" rows="4"
                                  class="w-full border rounded p-2" required>{{ $testimonial->testimonial_text }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Client Image</label>
                        <input type="file" name="client_image">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Sort Order</label>
                        <input type="number" name="sort_order"
                               value="{{ $testimonial->sort_order }}"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-6">
                        <label class="block mb-1">Status</label>
                        <select name="is_active" class="w-full border rounded p-2">
                            <option value="1" {{ $testimonial->is_active ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$testimonial->is_active ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="flex gap-3">
                        <button class="px-4 py-2 bg-green-600 text-white rounded">
                            Update
                        </button>

                        <a href="{{ route('admin.testimonials.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded">
                            Back
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
