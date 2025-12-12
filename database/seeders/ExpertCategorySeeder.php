<?php

namespace Database\Seeders;

use App\Models\Expert;
use App\Models\ExpertCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpertCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'IA', 'slug' => 'ia'],
            ['name' => 'Data', 'slug' => 'data'],
            ['name' => 'Cloud', 'slug' => 'cloud'],
            ['name' => 'Cybersecurity', 'slug' => 'cybersecurity'],
            ['name' => 'IT Products', 'slug' => 'it-products'],
            ['name' => 'Digital', 'slug' => 'digital'],
        ];

        foreach ($categories as $category) {
            ExpertCategory::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }

        // Create sample experts if we don't have enough
        if (Expert::count() < 6) {
            $categories = ExpertCategory::all();

            foreach ($categories as $index => $category) {
                Expert::create([
                    'name' => $category->name . ' Expert ' . ($index + 1),
                    'designation' => $category->name . ' Specialist',
                    'experience' => rand(5, 15),
                    'bio' => 'Experienced ' . $category->name . ' expert with over ' . rand(5, 15) . ' years of experience.',
                    'company' => 'Tech Company ' . ($index + 1),
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
