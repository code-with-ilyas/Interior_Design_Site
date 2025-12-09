<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ProjectCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectCategoryPolicy
{
    use HandlesAuthorization;

   
    public function viewAny(User $user): bool
    {
        return $user->can('view project categories');
    }

   
    public function view(User $user, ProjectCategory $projectCategory): bool
    {
        return $user->can('view project categories');
    }

    
    public function create(User $user): bool
    {
        return $user->can('create project categories');
    }

    
    public function update(User $user, ProjectCategory $projectCategory): bool
    {
        return $user->can('edit project categories');
    }

    
    public function delete(User $user, ProjectCategory $projectCategory): bool
    {
        return $user->can('delete project categories');
    }
}
