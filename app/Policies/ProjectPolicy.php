<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    
    public function viewAny(User $user): bool
    {
        return $user->can('view projects');
    }

   
    public function view(User $user, Project $project): bool
    {
        return $user->can('view projects');
    }

   
    public function create(User $user): bool
    {
        return $user->can('create projects');
    }

    
    public function update(User $user, Project $project): bool
    {
        return $user->can('edit projects');
    }

    
    public function delete(User $user, Project $project): bool
    {
        return $user->can('delete projects');
    }
}
