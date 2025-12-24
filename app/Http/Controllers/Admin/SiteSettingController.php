<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;

class SiteSettingController extends Controller
{
    /**
     * Show the form for editing the site settings.
     */
    public function edit()
    {
        // Fetch the first (and only) site settings record
        $setting = SiteSetting::first();
        return view('admin.site-settings.edit', compact('setting'));
    }

    /**
     * Update the site settings.
     */
    public function update(Request $request)
    {
        // Validate input fields
        $data = $request->validate([
            'site_name'           => 'nullable|string|max:255',
            'email'               => 'nullable|email|max:255',
            'address'             => 'nullable|string|max:255',
            'phone'               => ['nullable', 'string', 'max:50', 'regex:/^[0-9+\-\(\)\s]+$/'],
            'location'            => 'nullable|string|max:255',

            'logo'                => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'mobile_logo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'favicon'             => 'nullable|image|mimes:png,ico|max:1024',

            'terms_and_conditions' => 'nullable|string',
            'privacy_policy'       => 'nullable|string',
            'legal_notices'        => 'nullable|string',
            'about_us'             => 'nullable|string',

            'facebook'            => 'nullable|url|max:255',
            'instagram'           => 'nullable|url|max:255',
            'linkedin'            => 'nullable|url|max:255',
            'whatsapp'            => ['nullable', 'string', 'max:50', 'regex:/^[0-9+\-\(\)\s]+$/'],
        ]);

        // Fetch existing record or null
        $setting = SiteSetting::first();

        // Handle image uploads
        foreach (['logo', 'mobile_logo', 'favicon'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $file = $request->file($imageField);
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('admin/site-settings'), $filename);
                $data[$imageField] = 'admin/site-settings/' . $filename;

                // Remove old image if exists
                if ($setting && $setting->$imageField && file_exists(public_path($setting->$imageField))) {
                    unlink(public_path($setting->$imageField));
                }
            }
        }

        // Update existing record or create new
        if ($setting) {
            $setting->update($data);
        } else {
            SiteSetting::create($data);
        }

        return redirect()->back()->with('success', 'Site settings updated successfully.');
    }
}
