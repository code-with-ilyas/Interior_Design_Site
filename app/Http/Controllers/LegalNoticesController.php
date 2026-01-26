<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalNoticesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $siteSetting = \App\Models\SiteSetting::first();

        return view('pages.legal-notices', [
            'siteSetting' => $siteSetting,
            'content' => $siteSetting->legal_notices ?? 'Legal notices content will be added here.'
        ]);
    }
}
