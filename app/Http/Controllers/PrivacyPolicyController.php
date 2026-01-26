<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $siteSetting = \App\Models\SiteSetting::first();

        return view('pages.privacy-policy', [
            'siteSetting' => $siteSetting,
            'content' => $siteSetting->privacy_policy ?? 'Privacy policy content will be added here.'
        ]);
    }
}
