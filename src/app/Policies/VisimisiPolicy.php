<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Visimisi;
use Illuminate\Auth\Access\Response;

class VisimisiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Visimisi $visi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Visimisi $visi): bool
    {
        return $user->id === $visi->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Visimisi $visi): bool
    {
        return $user->id === $visi->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Visimisi $visi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Visimisi $visi): bool
    {
        return false;
    }
}
