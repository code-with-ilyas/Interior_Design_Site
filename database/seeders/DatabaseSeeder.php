<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    
    public function run(): void
    {
        
        $this->call([
            PermissionSeeder::class,
            AdminUserSeeder::class,
        ]);

       
        $testUser = User::where('email', 'test@example.com')->first();

        if (!$testUser) {
          
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        
        User::factory(10)->create();
    }
}
