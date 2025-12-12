<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions if they don't already exist
        $permissions = [
            'view admin dashboard',
            'manage users',
            'manage projects',
            'manage services',
            'manage blog',
            'manage quotes',
            'manage settings',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles if they don't already exist
        $roles = [
            'super-admin',
            'admin',
            'editor',
            'user',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Get the roles
        $superAdminRole = Role::where('name', 'super-admin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $editorRole = Role::where('name', 'editor')->first();

        // Assign all permissions to super-admin
        $superAdminRole->givePermissionTo(Permission::all());

        // Assign specific permissions to admin
        $adminPermissions = [
            'view admin dashboard',
            'manage projects',
            'manage services',
            'manage blog',
            'manage quotes'
        ];
        $adminRole->givePermissionTo($adminPermissions);

        // Assign specific permissions to editor
        $editorPermissions = [
            'view admin dashboard',
            'manage blog'
        ];
        $editorRole->givePermissionTo($editorPermissions);
    }
}
