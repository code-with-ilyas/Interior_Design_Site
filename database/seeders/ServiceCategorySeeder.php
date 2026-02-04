<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceCategory::create([
            'name' => 'Interior Design',
            'slug' => 'interior-design',
            'description' => 'Professional interior design services for homes and offices',
            'order' => 1,
            'is_active' => true
        ]);

        ServiceCategory::create([
            'name' => 'Renovation',
            'slug' => 'renovation',
            'description' => 'Complete home and office renovation services',
            'order' => 2,
            'is_active' => true
        ]);

        ServiceCategory::create([
            'name' => 'Construction',
            'slug' => 'construction',
            'description' => 'New construction and building services',
            'order' => 3,
            'is_active' => true
        ]);

        ServiceCategory::create([
            'name' => 'Maintenance',
            'slug' => 'maintenance',
            'description' => 'Regular maintenance and repair services',
            'order' => 4,
            'is_active' => true
        ]);
    }
}
