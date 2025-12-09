<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">Create Testimonial</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block mb-1 font-medium">Client Name</label>
                        <input type="text" name="client_name" class="w-full border-gray-300 rounded px-3 py-2" value="{{ old('client_name') }}" required>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Designation</label>
                        <input type="text" name="designation" class="w-full border-gray-300 rounded px-3 py-2" value="{{ old('designation') }}">
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Testimonial Text</label>
                        <textarea name="testimonial_text" rows="4" class="w-full border-gray-300 rounded px-3 py-2" required>{{ old('testimonial_text') }}</textarea>
                    </div>

                    <div>
                        <label class="block mb-1 font-medium">Client Image</label>
                        <input type="file" name="client_image" accept="image/*" class="w-full">
                        <img id="preview" class="mt-2 w-24 h-24 object-cover rounded hidden">
                    </div>

                   <br>

                    <div>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save Testimonial</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const input = document.querySelector('input[name="client_image"]');
        const preview = document.getElementById('preview');
        input.addEventListener('change', function(){
            const file = this.files[0];
            if(file){
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
            }
        });
    </script>
</x-app-layout>
