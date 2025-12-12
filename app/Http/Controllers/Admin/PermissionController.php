<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of permissions.
     */
    public function index()
    {
        $this->authorize('view permissions');

        // Paginate permissions (20 per page) for the permissions tab
        $permissions = Permission::paginate(20);
        $roles = Role::all();
        $users = User::all();

        // Group all permissions by modules for better UI organization
        // We still need all permissions for the role/user assignment tabs
        $allPermissions = Permission::all();
        $groupedPermissions = $this->groupPermissionsByModule($allPermissions);

        return view('admin.permissions.index', compact('permissions', 'roles', 'users', 'groupedPermissions'));
    }

    /**
     * Show the form for creating a new permission.
     */
    public function create()
    {
        $this->authorize('create permissions');

        return view('admin.permissions.create');
    }

    /**
     * Store a newly created permission in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create permissions');

        $validated = $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create($validated);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission created successfully.');
    }

    /**
     * Show the form for editing the specified permission.
     */
    public function edit(Permission $permission)
    {
        $this->authorize('edit permissions');

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified permission in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $this->authorize('edit permissions');

        $validated = $request->validate([
            'name' => ['required', Rule::unique('permissions')->ignore($permission->id)],
        ]);

        $permission->update($validated);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission updated successfully.');
    }

    /**
     * Remove the specified permission from storage.
     */
    public function destroy(Permission $permission)
    {
        $this->authorize('delete permissions');

        $permission->delete();

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission deleted successfully.');
    }

    /**
     * Assign permissions to a role.
     */
    public function assignToRole(Request $request)
    {
        $this->authorize('manage permissions');

        $validated = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::findById($validated['role_id']);
        $permissions = Permission::whereIn('id', $validated['permissions'])->get();

        $role->syncPermissions($permissions);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permissions assigned to role successfully.')
            ->with('selected_role_id', $validated['role_id'])
            ->with('active_tab', 'roles');
    }

    /**
     * Assign permissions to a user.
     */
    public function assignToUser(Request $request)
    {
        $this->authorize('manage permissions');

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $user = User::findOrFail($validated['user_id']);
        $permissions = Permission::whereIn('id', $validated['permissions'])->get();

        $user->syncPermissions($permissions);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permissions assigned to user successfully.')
            ->with('selected_user_id', $validated['user_id'])
            ->with('active_tab', 'users');
    }

    /**
     * Group permissions by module based on naming convention.
     *
     * @param Collection $permissions
     * @return array
     */
    private function groupPermissionsByModule($permissions)
    {
        $groups = [];

        foreach ($permissions as $permission) {
            // Extract module name from permission name
            // e.g., "view projects" -> "projects", "manage blog" -> "blog"
            $parts = explode(' ', $permission->name);
            if (count($parts) >= 2) {
                // For permissions like "view expert categories", we want to group by "expert categories"
                // not just "categories"
                if (count($parts) >= 3 && $parts[count($parts) - 1] === 'categories') {
                    // Combine the second to last and last words for better grouping
                    $module = $parts[count($parts) - 2] . ' ' . $parts[count($parts) - 1];
                } else {
                    $module = $parts[count($parts) - 1]; // Last word as module
                }

                // Handle pluralization
                $module = rtrim($module, 's');
            } else {
                $module = 'general';
            }

            // Capitalize first letter
            $module = ucfirst($module);

            if (!isset($groups[$module])) {
                $groups[$module] = [];
            }

            $groups[$module][] = $permission;
        }

        // Sort groups alphabetically
        ksort($groups);

        return $groups;
    }

    /**
     * Get permissions for a specific user.
     */
    public function getUserPermissions(Request $request)
    {
        $this->authorize('view permissions');

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);

        // Check if user is super admin
        if ($user->hasRole('super-admin')) {
            // Super admin has all permissions
            $userPermissions = Permission::all()->pluck('id')->toArray();
        } else {
            // Regular user, get their direct permissions
            $userPermissions = $user->permissions->pluck('id')->toArray();
        }

        return response()->json([
            'permissions' => $userPermissions,
        ]);
    }

    /**
     * Get permissions for a specific role.
     */
    public function getRolePermissions(Request $request)
    {
        $this->authorize('view permissions');

        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $role = Role::findById($request->role_id);
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return response()->json([
            'permissions' => $rolePermissions,
        ]);
    }
}
