<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;

class RolePolicy
{

    public function viewAny(User $user): bool
    {
        // return $user->can('view-any Role');
        if (auth()->$user()->can('view-any Role'))
            return true;
        else
            return false;
    }
    public function view(User $user, Role $role): bool
    {
        return $user->can('view Role');
    }
    public function __construct()
    {
        //
    }
}
