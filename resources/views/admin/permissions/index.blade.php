<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="mb-4 rounded-md bg-green-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-green-800">
                                        {{ session('success') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Error Message -->
                    @if(session('error'))
                        <div class="mb-4 rounded-md bg-red-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-red-800">
                                        {{ session('error') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mb-6">
                        <h3 class="text-lg font-medium mb-4">Permission Management</h3>
                        @can('create permissions')
                        <a href="{{ route('admin.permissions.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Create Permission
                        </a>
                        @endcan
                    </div>

                    <div class="mb-6">
                        <ul class="nav nav-tabs" id="permissionTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="permissions-tab" data-bs-toggle="tab" data-bs-target="#permissions" type="button" role="tab">All Permissions</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="roles-tab" data-bs-toggle="tab" data-bs-target="#roles" type="button" role="tab">Assign to Roles</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab">Assign to Users</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="permissionTabsContent">
                        <!-- Permissions Tab -->
                        <div class="tab-pane fade show active" id="permissions" role="tabpanel">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse($permissions as $permission)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permission->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $permission->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permission->created_at->format('Y-m-d H:i:s') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                @can('edit permissions')
                                                <a href="{{ route('admin.permissions.edit', $permission) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                                @endcan
                                                @can('delete permissions')
                                                <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this permission?')">Delete</button>
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                                No permissions found.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            @if($permissions instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                <div class="mt-6">
                                    {{ $permissions->links() }}
                                </div>
                            @endif
                        </div>

                        <!-- Assign to Roles Tab -->
                        <div class="tab-pane fade" id="roles" role="tabpanel">
                            <div class="mb-6 p-4 bg-blue-50 rounded-lg">
                                <p class="text-blue-800 font-medium">Note: Super Admin automatically has all permissions and cannot be modified here.</p>
                            </div>

                            <form action="{{ route('admin.permissions.assign-to-role') }}" method="POST" id="role-permissions-form">
                                @csrf

                                <div class="mb-6">
                                    <label for="role_id" class="block text-sm font-medium text-gray-700 mb-2">Select Role</label>
                                    <select name="role_id" id="role_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <option value="">Choose a role</option>
                                        @foreach($roles as $role)
                                            @if($role->name !== 'super-admin')
                                                <option value="{{ $role->id }}" {{ (session('selected_role_id') == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <p class="mt-2 text-sm text-gray-500">Select a role to load its current permissions.</p>
                                </div>

                                <div class="flex justify-between mb-4">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Save Role Permissions
                                    </button>
                                    <button type="button" id="select-all-role" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Select All
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6" id="role-modules-container">
                                    @foreach($groupedPermissions as $module => $modulePermissions)
                                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
                                        <div class="px-4 py-3 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                                            <h3 class="text-sm font-medium text-gray-900">{{ $module }} Module</h3>
                                            <div class="form-check">
                                                <input class="form-check-input h-4 w-4 text-indigo-600 rounded" type="checkbox" id="select-all-role-{{ \Illuminate\Support\Str::slug($module) }}">
                                                <label class="form-check-label text-sm text-gray-600 ml-2" for="select-all-role-{{ \Illuminate\Support\Str::slug($module) }}">
                                                    Select All
                                                </label>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            @foreach($modulePermissions as $permission)
                                            <div class="flex items-center mb-2">
                                                <input class="form-check-input h-4 w-4 text-indigo-600 rounded module-checkbox-role" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission_role_{{ $permission->id }}" data-module="{{ \Illuminate\Support\Str::slug($module) }}">
                                                <label class="form-check-label text-sm text-gray-700 ml-2" for="permission_role_{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="flex justify-between mt-6">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Save Role Permissions
                                    </button>
                                    <button type="button" id="select-all-role-bottom" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Select All
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Assign to Users Tab -->
                        <div class="tab-pane fade" id="users" role="tabpanel">
                            <div class="mb-6 p-4 bg-blue-50 rounded-lg" id="super-admin-user-message" style="display: none;">
                                <p class="text-blue-800 font-medium">Note: This user is a Super Admin and automatically has all permissions. Individual permission assignment is not needed.</p>
                            </div>

                            <form action="{{ route('admin.permissions.assign-to-user') }}" method="POST" id="user-permissions-form">
                                @csrf

                                <div class="mb-6">
                                    <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">Select User</label>
                                    <select name="user_id" id="user_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <option value="">Choose a user</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ (session('selected_user_id') == $user->id) ? 'selected' : '' }} data-is-super-admin="{{ $user->hasRole('super-admin') ? 'true' : 'false' }}">{{ $user->name }} ({{ $user->email }})</option>
                                        @endforeach
                                    </select>
                                    <p class="mt-2 text-sm text-gray-500">Select a user to load their current permissions.</p>
                                </div>

                                <div class="flex justify-between mb-4">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Save User Permissions
                                    </button>
                                    <button type="button" id="select-all-user" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Select All
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6" id="user-modules-container">
                                    @foreach($groupedPermissions as $module => $modulePermissions)
                                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
                                        <div class="px-4 py-3 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                                            <h3 class="text-sm font-medium text-gray-900">{{ $module }} Module</h3>
                                            <div class="form-check">
                                                <input class="form-check-input h-4 w-4 text-indigo-600 rounded" type="checkbox" id="select-all-user-{{ \Illuminate\Support\Str::slug($module) }}">
                                                <label class="form-check-label text-sm text-gray-600 ml-2" for="select-all-user-{{ \Illuminate\Support\Str::slug($module) }}">
                                                    Select All
                                                </label>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            @foreach($modulePermissions as $permission)
                                            <div class="flex items-center mb-2">
                                                <input class="form-check-input h-4 w-4 text-indigo-600 rounded module-checkbox-user" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission_user_{{ $permission->id }}" data-module="{{ \Illuminate\Support\Str::slug($module) }}">
                                                <label class="form-check-label text-sm text-gray-700 ml-2" for="permission_user_{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="flex justify-between mt-6">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Save User Permissions
                                    </button>
                                    <button type="button" id="select-all-user-bottom" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Select All
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for enhanced functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Role tab functionality
            const roleSelect = document.getElementById('role_id');

            // User tab functionality
            const userSelect = document.getElementById('user_id');
            const superAdminUserMessage = document.getElementById('super-admin-user-message');
            const userModulesContainer = document.getElementById('user-modules-container');
            const userFormButtons = document.querySelectorAll('#user-permissions-form button[type="submit"], #user-permissions-form button[id^="select-all-user"]');

            // Global select all buttons
            document.getElementById('select-all-role').addEventListener('click', function() {
                toggleAllCheckboxes('.module-checkbox-role', true);
            });

            document.getElementById('select-all-role-bottom').addEventListener('click', function() {
                toggleAllCheckboxes('.module-checkbox-role', true);
            });

            document.getElementById('select-all-user').addEventListener('click', function() {
                toggleAllCheckboxes('.module-checkbox-user', true);
            });

            document.getElementById('select-all-user-bottom').addEventListener('click', function() {
                toggleAllCheckboxes('.module-checkbox-user', true);
            });

            // Module-specific select all for roles
            document.querySelectorAll('[id^="select-all-role-"]').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const moduleId = this.id.replace('select-all-role-', '');
                    const moduleCheckboxes = document.querySelectorAll(`.module-checkbox-role[data-module="${moduleId}"]`);
                    moduleCheckboxes.forEach(cb => cb.checked = this.checked);
                });
            });

            // Module-specific select all for users
            document.querySelectorAll('[id^="select-all-user-"]').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const moduleId = this.id.replace('select-all-user-', '');
                    const moduleCheckboxes = document.querySelectorAll(`.module-checkbox-user[data-module="${moduleId}"]`);
                    moduleCheckboxes.forEach(cb => cb.checked = this.checked);
                });
            });

            // Load role permissions when role is selected
            if (roleSelect) {
                roleSelect.addEventListener('change', function() {
                    const roleId = this.value;
                    if (roleId) {
                        fetch(`/admin/permissions/role-permissions?role_id=${roleId}`)
                            .then(response => response.json())
                            .then(data => {
                                // Uncheck all checkboxes first
                                document.querySelectorAll('.module-checkbox-role').forEach(checkbox => {
                                    checkbox.checked = false;
                                });

                                // Check the permissions that the role has
                                data.permissions.forEach(permissionId => {
                                    const checkbox = document.querySelector(`.module-checkbox-role[value="${permissionId}"]`);
                                    if (checkbox) {
                                        checkbox.checked = true;
                                    }
                                });
                            })
                            .catch(error => {
                                console.error('Error loading role permissions:', error);
                            });
                    } else {
                        // Uncheck all checkboxes if no role is selected
                        document.querySelectorAll('.module-checkbox-role').forEach(checkbox => {
                            checkbox.checked = false;
                        });
                    }
                });

                // Trigger change event if a role is already selected (after form submission)
                if (roleSelect.value) {
                    roleSelect.dispatchEvent(new Event('change'));
                }
            }

            // Load user permissions when user is selected
            if (userSelect) {
                userSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const isSuperAdmin = selectedOption.getAttribute('data-is-super-admin') === 'true';

                    // Show/hide super admin message
                    if (isSuperAdmin) {
                        superAdminUserMessage.style.display = 'block';
                        userModulesContainer.style.opacity = '0.5';
                        // Disable form buttons for super admin
                        userFormButtons.forEach(button => {
                            button.disabled = true;
                        });
                    } else {
                        superAdminUserMessage.style.display = 'none';
                        userModulesContainer.style.opacity = '1';
                        // Enable form buttons for regular users
                        userFormButtons.forEach(button => {
                            button.disabled = false;
                        });
                    }

                    const userId = this.value;
                    if (userId && !isSuperAdmin) {
                        fetch(`/admin/permissions/user-permissions?user_id=${userId}`)
                            .then(response => response.json())
                            .then(data => {
                                // Uncheck all checkboxes first
                                document.querySelectorAll('.module-checkbox-user').forEach(checkbox => {
                                    checkbox.checked = false;
                                });

                                // Check the permissions that the user has
                                data.permissions.forEach(permissionId => {
                                    const checkbox = document.querySelector(`.module-checkbox-user[value="${permissionId}"]`);
                                    if (checkbox) {
                                        checkbox.checked = true;
                                    }
                                });
                            })
                            .catch(error => {
                                console.error('Error loading user permissions:', error);
                            });
                    } else if (!isSuperAdmin) {
                        // Uncheck all checkboxes if no user is selected
                        document.querySelectorAll('.module-checkbox-user').forEach(checkbox => {
                            checkbox.checked = false;
                        });
                    }
                });

                // Trigger change event if a user is already selected (after form submission)
                if (userSelect.value) {
                    userSelect.dispatchEvent(new Event('change'));
                }
            }

            // Function to toggle all checkboxes
            function toggleAllCheckboxes(selector, checked) {
                document.querySelectorAll(selector).forEach(checkbox => {
                    checkbox.checked = checked;
                });
            }

            // Activate the correct tab based on URL hash or session variable
            const urlHash = window.location.hash;
            const activeTab = "{{ session('active_tab') }}";

            if (urlHash) {
                const tabTrigger = document.querySelector(`[data-bs-target="${urlHash}"]`);
                if (tabTrigger) {
                    tabTrigger.click();
                }
            } else if (activeTab) {
                const tabTrigger = document.querySelector(`[data-bs-target="#${activeTab}"]`);
                if (tabTrigger) {
                    tabTrigger.click();
                }
            }
        });
    </script>
</x-app-layout>
