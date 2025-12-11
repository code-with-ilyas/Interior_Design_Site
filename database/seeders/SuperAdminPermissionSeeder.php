<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seeder ensures that the Super Admin role always has all permissions,
     * even when new permissions are added to the system.
     */
    public function run(): void
    {
        // Ensure the super-admin role exists
        $superAdminRole = Role::firstOrCreate(['name' => 'super-admin']);

        // Assign ALL permissions to super-admin
        // This ensures that whenever new permissions are added to the system,
        // the super admin will automatically get them
        $superAdminRole->givePermissionTo(Permission::all());
    }
}
