<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ExpertCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpertCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view expert categories');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ExpertCategory $expertCategory): bool
    {
        return $user->can('view expert categories');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create expert categories');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ExpertCategory $expertCategory): bool
    {
        return $user->can('edit expert categories');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ExpertCategory $expertCategory): bool
    {
        return $user->can('delete expert categories');
    }
}
