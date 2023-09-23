<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\BerkasPinjam;
use App\Models\User;

class BerkasPinjamPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any BerkasPinjam');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BerkasPinjam $berkaspinjam): bool
    {
        return $user->can('view BerkasPinjam');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create BerkasPinjam');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BerkasPinjam $berkaspinjam): bool
    {
        return $user->can('update BerkasPinjam');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BerkasPinjam $berkaspinjam): bool
    {
        return $user->can('delete BerkasPinjam');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BerkasPinjam $berkaspinjam): bool
    {
        return $user->can('restore BerkasPinjam');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BerkasPinjam $berkaspinjam): bool
    {
        return $user->can('force-delete BerkasPinjam');
    }
}
