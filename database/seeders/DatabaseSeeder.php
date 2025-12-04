<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the seeders in the correct order
        $this->call([
            PermissionSeeder::class,
            AdminUserSeeder::class,
        ]);

        // Check if the test user already exists
        $testUser = User::where('email', 'test@example.com')->first();

        if (!$testUser) {
            // Create a test user
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Create additional users (but avoid duplicates)
        User::factory(10)->create();
    }
}
