<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PengembalianAgunan;
use App\Models\User;

class PengembalianAgunanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any PengembalianAgunan');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PengembalianAgunan $pengembalianagunan): bool
    {
        return $user->can('view PengembalianAgunan');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create PengembalianAgunan');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PengembalianAgunan $pengembalianagunan): bool
    {
        return $user->can('update PengembalianAgunan');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PengembalianAgunan $pengembalianagunan): bool
    {
        return $user->can('delete PengembalianAgunan');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PengembalianAgunan $pengembalianagunan): bool
    {
        return $user->can('restore PengembalianAgunan');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PengembalianAgunan $pengembalianagunan): bool
    {
        return $user->can('force-delete PengembalianAgunan');
    }
}
