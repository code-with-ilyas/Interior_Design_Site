<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Call permission and user seeders first
        $this->call(PermissionSeeder::class);
        $this->call(SuperAdminPermissionSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(AssignRolesSeeder::class);

        // Call data seeders
        $this->call(CompanySeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ExpertCategorySeeder::class);
        $this->call(SkillSeeder::class);

        // Call project-related seeders
        $this->call(ProjectCategorySeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ProjectImageSeeder::class);
        $this->call(ProjectExpertSeeder::class);
    }
}
