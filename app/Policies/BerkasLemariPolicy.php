<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\BerkasLemari;
use App\Models\User;

class BerkasLemariPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any BerkasLemari');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BerkasLemari $berkaslemari): bool
    {
        return $user->can('view BerkasLemari');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create BerkasLemari');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BerkasLemari $berkaslemari): bool
    {
        return $user->can('update BerkasLemari');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BerkasLemari $berkaslemari): bool
    {
        return $user->can('delete BerkasLemari');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BerkasLemari $berkaslemari): bool
    {
        return $user->can('restore BerkasLemari');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BerkasLemari $berkaslemari): bool
    {
        return $user->can('force-delete BerkasLemari');
    }
}
