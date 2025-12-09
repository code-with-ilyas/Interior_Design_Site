<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignRolesSeeder extends Seeder
{
   
    public function run(): void
    {
        
        $adminUser = User::where('email', 'admin@example.com')->first();
        if ($adminUser) {
            $adminUser->assignRole('super-admin');
        }

      
        $testUser = User::where('email', 'test@example.com')->first();
        if ($testUser) {
            $testUser->assignRole('admin');
        }

        
        $users = User::whereNotIn('email', ['admin@example.com', 'test@example.com'])->limit(5)->get();
        foreach ($users as $user) {
            $user->assignRole('editor');
        }

       
        $remainingUsers = User::whereNotIn('email', ['admin@example.com', 'test@example.com'])
            ->whereDoesntHave('roles')
            ->get();
        foreach ($remainingUsers as $user) {
            $user->assignRole('user');
        }
    }
}
