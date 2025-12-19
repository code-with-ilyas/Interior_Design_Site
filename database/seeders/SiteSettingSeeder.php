<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('site_settings')->updateOrInsert(
            ['id' => 1], // single row only
            [
                'site_name' => 'My Website',
                'email' => 'info@mywebsite.com',
                'address' => 'Lahore, Pakistan',
                'phone' => '+92 300 1234567',
                'location' => 'Pakistan',

                'logo' => null,
                'mobile_logo' => null,
                'favicon' => null,

                'terms_and_conditions' => 'Default terms and conditions text.',
                'privacy_policy' => 'Default privacy policy text.',
                'legal_notices' => 'Default legal notices text.',
                'about_us' => 'This is a demo About Us section.',

                'facebook' => 'https://facebook.com/yourpage',
                'instagram' => 'https://instagram.com/yourpage',
                'linkedin' => 'https://linkedin.com/company/yourpage',
                'whatsapp' => 'https://wa.me/923001234567',

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
