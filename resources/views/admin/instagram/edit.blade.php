<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Instagram Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Update Image</h3>

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

                    <form method="POST" action="{{ route('admin.instagram.update', $instagram->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">Select Image</label>
                                <input type="file" name="image" id="image"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <p class="mt-1 text-sm text-gray-500">Leave empty to keep the current image.</p>
                                @error('image')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            @if($instagram->image)
                            <div class="text-center mb-4">
                                <p class="mb-2 font-medium">Current Image:</p>
                                <img src="{{ Storage::url($instagram->image) }}" alt="Instagram Image"
                                    class="mx-auto rounded" style="max-height:200px;">
                            </div>
                            @endif


                            <div class="mt-6 flex items-center justify-end gap-3">
                                <a href="{{ route('admin.instagram.index') }}"
                                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-dark rounded hover:bg-blue-600">Update Image</button>
                            </div>
                    </form>

                    @if(session('success'))
                    <div class="mt-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>