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

            // User permissions
            'view users',
            'create users',
            'edit users',
            'delete users',

            // Expert permissions
            'view experts',
            'create experts',
            'edit experts',
            'delete experts',

            // Skill permissions
            'view skills',
            'create skills',
            'edit skills',
            'delete skills',

            // Expert categories permissions
            'view expert categories',
            'create expert categories',
            'edit expert categories',
            'delete expert categories',

            // Projects module permissions
            'view projects',
            'create projects',
            'edit projects',
            'delete projects',

            // Project categories permissions
            'view project categories',
            'create project categories',
            'edit project categories',
            'delete project categories',

            // Project images permissions
            'view project images',
            'create project images',
            'edit project images',
            'delete project images',

            // Services permissions
            'view services',
            'create services',
            'edit services',
            'delete services',

            // Features permissions
            'view features',
            'create features',
            'edit features',
            'delete features',

            // Blog posts permissions
            'view blog posts',
            'create blog posts',
            'edit blog posts',
            'delete blog posts',

            // Blog categories permissions
            'view blog categories',
            'create blog categories',
            'edit blog categories',
            'delete blog categories',

            // Blog post images permissions
            'view blog post images',
            'create blog post images',
            'edit blog post images',
            'delete blog post images',

            // Quotes permissions
            'view quotes',
            'create quotes',
            'edit quotes',
            'delete quotes',

            // Testimonials permissions
            'view testimonials',
            'create testimonials',
            'edit testimonials',
            'delete testimonials',

            // Companies permissions
            'view companies',
            'create companies',
            'edit companies',
            'delete companies',

            // Contacts permissions
            'view contacts',
            'create contacts',
            'edit contacts',
            'delete contacts',

            // Site settings permissions
            'view site settings',
            'create site settings',
            'edit site settings',
            'delete site settings',

            // Permission management permissions
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',
            'manage permissions',
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

        // Assign ALL permissions to super-admin (this ensures automatic assignment)
        $superAdminRole->givePermissionTo(Permission::all());

        // Assign specific permissions to admin
        $adminPermissions = [
            'view admin dashboard',
            'manage projects',
            'manage services',
            'manage blog',
            'manage quotes',

            // User permissions
            'view users',
            'create users',
            'edit users',
            'delete users',

            // Expert permissions
            'view experts',
            'create experts',
            'edit experts',
            'delete experts',

            // Skill permissions
            'view skills',
            'create skills',
            'edit skills',
            'delete skills',

            // Expert categories permissions
            'view expert categories',
            'create expert categories',
            'edit expert categories',
            'delete expert categories',

            // Projects module permissions
            'view projects',
            'create projects',
            'edit projects',
            'delete projects',

            // Project categories permissions
            'view project categories',
            'create project categories',
            'edit project categories',
            'delete project categories',

            // Project images permissions
            'view project images',
            'create project images',
            'edit project images',
            'delete project images',

            // Services permissions
            'view services',
            'create services',
            'edit services',
            'delete services',

            // Features permissions
            'view features',
            'create features',
            'edit features',
            'delete features',

            // Blog posts permissions
            'view blog posts',
            'create blog posts',
            'edit blog posts',
            'delete blog posts',

            // Blog categories permissions
            'view blog categories',
            'create blog categories',
            'edit blog categories',
            'delete blog categories',

            // Blog post images permissions
            'view blog post images',
            'create blog post images',
            'edit blog post images',
            'delete blog post images',

            // Quotes permissions
            'view quotes',
            'create quotes',
            'edit quotes',
            'delete quotes',

            // Testimonials permissions
            'view testimonials',
            'create testimonials',
            'edit testimonials',
            'delete testimonials',

            // Companies permissions
            'view companies',
            'create companies',
            'edit companies',
            'delete companies',

            // Contacts permissions
            'view contacts',
            'create contacts',
            'edit contacts',
            'delete contacts',

            // Site settings permissions
            'view site settings',
            'create site settings',
            'edit site settings',
            'delete site settings',

            // Permission management permissions
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',
            'manage permissions',
        ];
        $adminRole->givePermissionTo($adminPermissions);

        // Assign specific permissions to editor
        $editorPermissions = [
            'view admin dashboard',
            'manage blog',
            // Blog posts permissions
            'view blog posts',
            'create blog posts',
            'edit blog posts',
            'delete blog posts',

            // Blog categories permissions
            'view blog categories',
            'create blog categories',
            'edit blog categories',
            'delete blog categories',

            // Blog post images permissions
            'view blog post images',
            'create blog post images',
            'edit blog post images',
            'delete blog post images',
        ];
        $editorRole->givePermissionTo($editorPermissions);
    }
}
