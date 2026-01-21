<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectModuleSeeder extends Seeder
{
    /**
     * Run the database seeds for project modules.
     */
    public function run(): void
    {
        $this->call(ProjectCategorySeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ProjectImageSeeder::class);
        $this->call(ProjectExpertSeeder::class);
    }
}
