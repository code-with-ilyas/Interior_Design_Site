<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'Premium Client',
            'description' => 'Leading company in luxury goods industry',
            'logo' => json_encode([
                'assets/img/company-logo-placeholder.png',
                'assets/img/company-logo-placeholder.png',
                'assets/img/company-logo-placeholder.png'
            ])
        ]);

        Customer::create([
            'name' => 'Global Partner',
            'description' => 'International technology solutions provider',
            'logo' => json_encode([
                'assets/img/company-logo-placeholder.png',
                'assets/img/company-logo-placeholder.png',
                'assets/img/company-logo-placeholder.png'
            ])
        ]);

        Customer::create([
            'name' => 'Trusted Vendor',
            'description' => 'Reliable service provider with industry expertise',
            'logo' => json_encode([
                'assets/img/company-logo-placeholder.png',
                'assets/img/company-logo-placeholder.png',
                'assets/img/company-logo-placeholder.png'
            ])
        ]);
    }
}
