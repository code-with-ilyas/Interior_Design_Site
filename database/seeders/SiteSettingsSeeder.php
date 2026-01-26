<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::firstOrCreate([], [
            'site_name' => 'H24 Renovation',
            'email' => 'info@h24renovation.test',
            'phone' => '+1234567890',
            'address' => '123 Main Street, City, Country',
            'location' => 'Main Office Location',
            'facebook' => 'https://facebook.com/h24renovation',
            'instagram' => 'https://instagram.com/h24renovation',
            'linkedin' => 'https://linkedin.com/company/h24renovation',
            'whatsapp' => 'https://wa.me/1234567890',
            'about_us' => 'We are a leading renovation company specializing in home and office transformations.',
            'terms_and_conditions' => 'Terms and conditions for using our services...',
            'privacy_policy' => 'Privacy policy for our website and services...',
            'legal_notices' => 'Legal notices and disclaimers...'
        ]);
    }
}
