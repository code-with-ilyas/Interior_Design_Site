<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class SiteSettingController extends Controller
{
    public function index()
    {
        $siteSetting = SiteSetting::firstOrCreate([]);
        return view('admin.site-settings.index', compact('siteSetting'));
    }

    public function update(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'site_name' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|max:255',
                'address' => 'sometimes|string|max:500',
                'phone' => 'sometimes|string|max:50',
                'location' => 'sometimes|string|max:500',
                'logo' => ['sometimes', 'nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'mobile_logo' => ['sometimes', 'nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'favicon' => ['sometimes', 'nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'about_us_image' => ['sometimes', 'nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'about_short_description' => 'sometimes|nullable|string',
                'terms_and_conditions' => 'sometimes|string',
                'privacy_policy' => 'sometimes|string',
                'legal_notices' => 'sometimes|string',
                'about_us' => 'sometimes|string',
                'facebook' => 'sometimes|url|max:255',
                'instagram' => 'sometimes|url|max:255',
                'linkedin' => 'sometimes|url|max:255',
                'whatsapp' => 'sometimes|url|max:255',
            ]);

            $siteSetting = SiteSetting::firstOrCreate([]);

            // Handle file uploads with error checking
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                if ($file->isValid()) {
                    // Delete old logo if exists
                    if ($siteSetting->logo) {
                        Storage::disk('public')->delete($siteSetting->logo);
                    }

                    $logoPath = $file->store('logos', 'public');
                    $siteSetting->logo = $logoPath;
                    Log::info('Logo updated: ' . $logoPath);
                } else {
                    Log::warning('Logo file is invalid');
                    return redirect()->back()->with('error', 'Logo file is invalid')->withInput();
                }
            }

            if ($request->hasFile('mobile_logo')) {
                $file = $request->file('mobile_logo');
                if ($file->isValid()) {
                    // Delete old mobile logo if exists
                    if ($siteSetting->mobile_logo) {
                        Storage::disk('public')->delete($siteSetting->mobile_logo);
                    }

                    $mobileLogoPath = $file->store('logos', 'public');
                    $siteSetting->mobile_logo = $mobileLogoPath;
                    Log::info('Mobile logo updated: ' . $mobileLogoPath);
                } else {
                    Log::warning('Mobile logo file is invalid');
                    return redirect()->back()->with('error', 'Mobile logo file is invalid')->withInput();
                }
            }

            if ($request->hasFile('favicon')) {
                $file = $request->file('favicon');
                if ($file->isValid()) {
                    // Delete old favicon if exists
                    if ($siteSetting->favicon) {
                        Storage::disk('public')->delete($siteSetting->favicon);
                    }

                    $faviconPath = $file->store('favicons', 'public');
                    $siteSetting->favicon = $faviconPath;
                    Log::info('Favicon updated: ' . $faviconPath);
                } else {
                    Log::warning('Favicon file is invalid');
                    return redirect()->back()->with('error', 'Favicon file is invalid')->withInput();
                }
            }

            // Handle about_us_image upload
            if ($request->hasFile('about_us_image')) {
                $file = $request->file('about_us_image');
                if ($file->isValid()) {
                    // Delete old about_us_image if exists
                    if ($siteSetting->about_us_image) {
                        Storage::disk('public')->delete($siteSetting->about_us_image);
                    }

                    $aboutUsImagePath = $file->store('about', 'public');
                    $siteSetting->about_us_image = $aboutUsImagePath;
                    Log::info('About us image updated: ' . $aboutUsImagePath);
                } else {
                    Log::warning('About us image file is invalid');
                    return redirect()->back()->with('error', 'About us image file is invalid')->withInput();
                }
            }

            // Prepare data for other fields, excluding file fields
            $otherData = collect($validatedData)->except(['logo', 'mobile_logo', 'favicon', 'about_us_image'])->toArray();

            // Update other fields
            $siteSetting->fill($otherData);
            $siteSetting->save();

            Log::info('Site settings updated successfully');
            return redirect()->route('admin.site-settings.index')->with('success', 'Site settings updated successfully.');
        } catch (ValidationException $e) {
            Log::error('Validation error in site settings update: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Site setting update error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating site settings: ' . $e->getMessage())->withInput();
        }
    }
}
