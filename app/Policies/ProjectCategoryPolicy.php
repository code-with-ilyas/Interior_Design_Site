<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ProjectCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view project categories');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ProjectCategory $projectCategory): bool
    {
        return $user->can('view project categories');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create project categories');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ProjectCategory $projectCategory): bool
    {
        return $user->can('edit project categories');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProjectCategory $projectCategory): bool
    {
        return $user->can('delete project categories');
    }
}
