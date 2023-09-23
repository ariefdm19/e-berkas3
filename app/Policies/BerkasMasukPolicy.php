<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\BerkasMasuk;
use App\Models\User;

class BerkasMasukPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any BerkasMasuk');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BerkasMasuk $berkasmasuk): bool
    {
        return $user->can('view BerkasMasuk');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create BerkasMasuk');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BerkasMasuk $berkasmasuk): bool
    {
        return $user->can('update BerkasMasuk');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BerkasMasuk $berkasmasuk): bool
    {
        return $user->can('delete BerkasMasuk');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BerkasMasuk $berkasmasuk): bool
    {
        return $user->can('restore BerkasMasuk');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BerkasMasuk $berkasmasuk): bool
    {
        return $user->can('force-delete BerkasMasuk');
    }
}
