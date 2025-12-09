<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
      
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

       
        $roles = [
            'super-admin',
            'admin',
            'editor',
            'user',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        
        $superAdminRole = Role::where('name', 'super-admin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $editorRole = Role::where('name', 'editor')->first();

      
        $superAdminRole->givePermissionTo(Permission::all());

       
        $adminPermissions = [
            'view admin dashboard',
            'manage projects',
            'manage services',
            'manage blog',
            'manage quotes'
        ];
        $adminRole->givePermissionTo($adminPermissions);

       
        $editorPermissions = [
            'view admin dashboard',
            'manage blog'
        ];
        $editorRole->givePermissionTo($editorPermissions);
    }
}
