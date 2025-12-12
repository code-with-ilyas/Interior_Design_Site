<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Expert;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpertPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view experts');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Expert $expert): bool
    {
        return $user->can('view experts');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create experts');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Expert $expert): bool
    {
        return $user->can('edit experts');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Expert $expert): bool
    {
        return $user->can('delete experts');
    }
}
