<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Run the permission seeder first to ensure roles exist
        $this->call(PermissionSeeder::class);

        // Check if the admin user already exists
        $adminUser = User::where('email', 'admin@example.com')->first();

        if (!$adminUser) {
            $adminUser = User::factory()->create([
                'name' => 'Super Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Assign super-admin role
        $adminUser->assignRole('super-admin');
    }
}
