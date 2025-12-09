<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Expert;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpertPolicy
{
    use HandlesAuthorization;

    
    public function viewAny(User $user): bool
    {
        return $user->can('view experts');

    }

    public function view(User $user, Expert $expert): bool
    {
        return $user->can('view experts');
    }

   
    public function create(User $user): bool
    {
        return $user->can('create experts');
    }

    
    public function update(User $user, Expert $expert): bool
    {
        return $user->can('edit experts');
    }

    
    public function delete(User $user, Expert $expert): bool
    {
        return $user->can('delete experts');
    }
}
