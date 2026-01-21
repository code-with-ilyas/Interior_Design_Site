<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Residential'],
            ['name' => 'Commercial'],
            ['name' => 'Multipurpose'],
            ['name' => 'Renovation'],
            ['name' => 'Interior Design'],
            ['name' => 'Exterior Works'],
        ];

        foreach ($categories as $category) {
            ProjectCategory::firstOrCreate(
                ['name' => $category['name']],
                ['name' => $category['name']]
            );
        }
    }
}
