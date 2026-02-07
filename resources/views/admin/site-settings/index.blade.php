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
                    <h3 class="text-lg font-medium mb-6">Site Settings</h3>

                    @if(session('success'))
                        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-4 px-4 py-2 bg-red-100 text-red-800 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4 px-4 py-2 bg-red-100 text-red-800 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.site-settings.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="site_name" class="block text-sm font-medium text-gray-700">Site Name</label>
                                <input type="text" name="site_name" id="site_name"
                                    value="{{ old('site_name', $siteSetting->site_name) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $siteSetting->email) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text" name="phone" id="phone"
                                    value="{{ old('phone', $siteSetting->phone) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <input type="text" name="address" id="address"
                                    value="{{ old('address', $siteSetting->address) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <input type="text" name="location" id="location"
                                    value="{{ old('location', $siteSetting->location) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="office_timings" class="block text-sm font-medium text-gray-700">Office Timings</label>
                                <input type="text" name="office_timings" id="office_timings"
                                    value="{{ old('office_timings', $siteSetting->office_timings) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    placeholder="e.g., Mon-Fri: 9AM-6PM, Sat: 10AM-2PM">
                            </div>

                            <div>
                                <label for="about_short_description" class="block text-sm font-medium text-gray-700">About Short Description</label>
                                <textarea name="about_short_description" id="about_short_description" rows="3"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('about_short_description', $siteSetting->about_short_description) }}</textarea>
                            </div>

                            <div>
                                <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook URL</label>
                                <input type="url" name="facebook" id="facebook"
                                    value="{{ old('facebook', $siteSetting->facebook) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="instagram" class="block text-sm font-medium text-gray-700">Instagram URL</label>
                                <input type="url" name="instagram" id="instagram"
                                    value="{{ old('instagram', $siteSetting->instagram) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="linkedin" class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                                <input type="url" name="linkedin" id="linkedin"
                                    value="{{ old('linkedin', $siteSetting->linkedin) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="whatsapp" class="block text-sm font-medium text-gray-700">WhatsApp URL</label>
                                <input type="url" name="whatsapp" id="whatsapp"
                                    value="{{ old('whatsapp', $siteSetting->whatsapp) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div>
                                <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                                @if($siteSetting->logo)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $siteSetting->logo) }}" alt="Current Logo" class="h-16 w-auto">
                                    </div>
                                @endif
                                <input type="file" name="logo" id="logo"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <p class="mt-1 text-sm text-gray-500">Upload a new logo (max 2MB)</p>
                            </div>

                            <div>
                                <label for="mobile_logo" class="block text-sm font-medium text-gray-700">Mobile Logo</label>
                                @if($siteSetting->mobile_logo)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $siteSetting->mobile_logo) }}" alt="Current Mobile Logo" class="h-16 w-auto">
                                    </div>
                                @endif
                                <input type="file" name="mobile_logo" id="mobile_logo"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <p class="mt-1 text-sm text-gray-500">Upload a mobile logo (max 2MB)</p>
                            </div>

                            <div>
                                <label for="favicon" class="block text-sm font-medium text-gray-700">Favicon</label>
                                @if($siteSetting->favicon)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $siteSetting->favicon) }}" alt="Current Favicon" class="h-16 w-auto">
                                    </div>
                                @endif
                                <input type="file" name="favicon" id="favicon"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <p class="mt-1 text-sm text-gray-500">Upload a favicon (max 2MB)</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-6 mb-6">
                            <div>
                                <label for="about_us_image" class="block text-sm font-medium text-gray-700">About Us Image</label>
                                @if($siteSetting->about_us_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $siteSetting->about_us_image) }}" alt="Current About Us Image" class="h-32 w-auto">
                                    </div>
                                @endif
                                <input type="file" name="about_us_image" id="about_us_image"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <p class="mt-1 text-sm text-gray-500">Upload an image for the about us section (max 2MB)</p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="about_us" class="block text-sm font-medium text-gray-700">About Us</label>
                            <textarea name="about_us" id="about_us" rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('about_us', $siteSetting->about_us) }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label for="terms_and_conditions" class="block text-sm font-medium text-gray-700">Terms and Conditions</label>
                            <textarea name="terms_and_conditions" id="terms_and_conditions" rows="6"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('terms_and_conditions', $siteSetting->terms_and_conditions) }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label for="privacy_policy" class="block text-sm font-medium text-gray-700">Privacy Policy</label>
                            <textarea name="privacy_policy" id="privacy_policy" rows="6"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('privacy_policy', $siteSetting->privacy_policy) }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label for="legal_notices" class="block text-sm font-medium text-gray-700">Legal Notices</label>
                            <textarea name="legal_notices" id="legal_notices" rows="6"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('legal_notices', $siteSetting->legal_notices) }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Update Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
