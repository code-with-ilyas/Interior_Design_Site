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
                'https://via.placeholder.com/150x80/4285F4/FFFFFF?text=Loreal',
                'https://via.placeholder.com/150x80/EA4335/FFFFFF?text=Renault',
                'https://via.placeholder.com/150x80/34A853/FFFFFF?text=LVMH'
            ])
        ]);

        Customer::create([
            'name' => 'Global Partner',
            'description' => 'International technology solutions provider',
            'logo' => json_encode([
                'https://via.placeholder.com/150x80/4285F4/FFFFFF?text=MSFT',
                'https://via.placeholder.com/150x80/EA4335/FFFFFF?text=GOOGL',
                'https://via.placeholder.com/150x80/FBBC04/FFFFFF?text=APPLE'
            ])
        ]);

        Customer::create([
            'name' => 'Trusted Vendor',
            'description' => 'Reliable service provider with industry expertise',
            'logo' => json_encode([
                'https://via.placeholder.com/150x80/185ABC/FFFFFF?text=VISA',
                'https://via.placeholder.com/150x80/142EB1/FFFFFF?text=SAMSUNG',
                'https://via.placeholder.com/150x80/FF6B35/FFFFFF?text=XIAOMI'
            ])
        ]);
    }
}
