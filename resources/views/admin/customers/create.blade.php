<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Customer</h2>
    </x-slot>
    <br>

    <div class="py-10 px-4 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Customer Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea name="description"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                        rows="4" required>{{ old('description') }}</textarea>
                </div>

<!-- 
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Logo</label>
                    <input type="file" name="logo" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div> -->


                <div class="flex justify-end">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.customers.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>