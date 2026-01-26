<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class TermsAndConditionsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $siteSetting = \App\Models\SiteSetting::first();

        return view('pages.terms-and-conditions', [
            'siteSetting' => $siteSetting,
            'content' => $siteSetting->terms_and_conditions ?? 'Terms and conditions content will be added here.'
        ]);
    }
}
