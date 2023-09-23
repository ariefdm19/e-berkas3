<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AgunanMasuk;
use App\Models\User;

class AgunanMasukPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any AgunanMasuk');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AgunanMasuk $agunanmasuk): bool
    {
        return $user->can('view AgunanMasuk');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create AgunanMasuk');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AgunanMasuk $agunanmasuk): bool
    {
        return $user->can('update AgunanMasuk');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AgunanMasuk $agunanmasuk): bool
    {
        return $user->can('delete AgunanMasuk');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AgunanMasuk $agunanmasuk): bool
    {
        return $user->can('restore AgunanMasuk');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AgunanMasuk $agunanmasuk): bool
    {
        return $user->can('force-delete AgunanMasuk');
    }
}
