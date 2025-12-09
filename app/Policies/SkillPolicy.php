<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkillPolicy
{
    use HandlesAuthorization;

    
    public function viewAny(User $user): bool
    {
        return $user->can('view skills');
    }

    
    public function view(User $user, Skill $skill): bool
    {
        return $user->can('view skills');
    }

   
    public function create(User $user): bool
    {
        return $user->can('create skills');
    }

    
    public function update(User $user, Skill $skill): bool
    {
        return $user->can('edit skills');
    }

    
    public function delete(User $user, Skill $skill): bool
    {
        return $user->can('delete skills');
    }
}
