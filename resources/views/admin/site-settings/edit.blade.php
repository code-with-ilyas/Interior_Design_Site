<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Site Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Update Site Settings</h3>

                    <!-- Success Message -->
                    @if(session('success'))
                    <div class="mb-4">
                        <div class="font-medium text-green-600">
                            {{ session('success') }}
                        </div>
                    </div>
                    @endif

                    <!-- Validation Errors -->
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

                    <form method="POST" action="{{ route('admin.site-settings.update', $setting->id ?? 1) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- Basic Info -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Site Name</label>
                                <input type="text" name="site_name" value="{{ old('site_name', $setting->site_name ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" value="{{ old('email', $setting->email ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone', $setting->phone ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Address</label>
                                <input type="text" name="address" value="{{ old('address', $setting->address ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Location</label>
                                <input type="text" name="location" value="{{ old('location', $setting->location ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">WhatsApp</label>
                                <input type="text" name="whatsapp" value="{{ old('whatsapp', $setting->whatsapp ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Facebook</label>
                                <input type="text" name="facebook" value="{{ old('facebook', $setting->facebook ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Instagram</label>
                                <input type="text" name="instagram" value="{{ old('instagram', $setting->instagram ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">LinkedIn</label>
                                <input type="text" name="linkedin" value="{{ old('linkedin', $setting->linkedin ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Privacy Policy</label>
                                <input type="text" name="privacy_policy" value="{{ old('privacy_policy', $setting->privacy_policy ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Legal Notices</label>
                                <input type="text" name="legal_notices" value="{{ old('legal_notices', $setting->legal_notices ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">About Us</label>
                                <input type="text" name="about_us" value="{{ old('about_us', $setting->about_us ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Terms & Conditions</label>
                                <input type="text" name="terms_and_conditions" value="{{ old('terms_and_conditions', $setting->terms_and_conditions ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Logo</label>
                                <div class="mt-1">
                                    <input type="file" name="logo"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                                @if(!empty($setting->logo))
                                <img src="{{ asset($setting->logo) }}" class="h-20 mt-2 object-contain">
                                @endif
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Mobile Logo</label>
                                <div class="mt-1">
                                    <input type="file" name="mobile_logo"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                                @if(!empty($setting->mobile_logo))
                                <img src="{{ asset($setting->mobile_logo) }}" class="h-20 mt-2 object-contain">
                                @endif
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Favicon</label>
                                <div class="mt-1">
                                    <input type="file" name="favicon"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                                @if(!empty($setting->favicon))
                                <img src="{{ asset($setting->favicon) }}" class="h-10 mt-2 object-contain">
                                @endif
                            </div>


                            <!-- Submit + Cancel -->
                            <div class="mt-6 flex items-center justify-end gap-3">
                                <a href="{{ route('admin.dashboard') }}"
                                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                    Save Settings
                                </button>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>