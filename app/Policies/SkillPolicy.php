<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkillPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view skills');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Skill $skill): bool
    {
        return $user->can('view skills');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create skills');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Skill $skill): bool
    {
        return $user->can('edit skills');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Skill $skill): bool
    {
        return $user->can('delete skills');
    }
}
