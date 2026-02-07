<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateOfficeTimingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siteSetting = \App\Models\SiteSetting::first();
        if ($siteSetting) {
            $siteSetting->update([
                'office_timings' => 'Mon-Fri: 9:00 AM - 6:00 PM, Sat: 10:00 AM - 2:00 PM'
            ]);
        }
    }
}
