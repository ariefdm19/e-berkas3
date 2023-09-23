<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\StatusAgunan;
use App\Models\User;

class StatusAgunanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any StatusAgunan');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StatusAgunan $statusagunan): bool
    {
        return $user->can('view StatusAgunan');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create StatusAgunan');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StatusAgunan $statusagunan): bool
    {
        return $user->can('update StatusAgunan');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StatusAgunan $statusagunan): bool
    {
        return $user->can('delete StatusAgunan');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StatusAgunan $statusagunan): bool
    {
        return $user->can('restore StatusAgunan');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StatusAgunan $statusagunan): bool
    {
        return $user->can('force-delete StatusAgunan');
    }
}
