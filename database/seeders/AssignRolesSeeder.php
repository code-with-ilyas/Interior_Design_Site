<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assign super-admin role to admin user
        $adminUser = User::where('email', 'admin@example.com')->first();
        if ($adminUser) {
            $adminUser->assignRole('super-admin');
        }

        // Assign admin role to test user
        $testUser = User::where('email', 'test@example.com')->first();
        if ($testUser) {
            $testUser->assignRole('admin');
        }

        // Assign editor role to some users
        $users = User::whereNotIn('email', ['admin@example.com', 'test@example.com'])->limit(5)->get();
        foreach ($users as $user) {
            $user->assignRole('editor');
        }

        // Assign user role to remaining users
        $remainingUsers = User::whereNotIn('email', ['admin@example.com', 'test@example.com'])
            ->whereDoesntHave('roles')
            ->get();
        foreach ($remainingUsers as $user) {
            $user->assignRole('user');
        }
    }
}
