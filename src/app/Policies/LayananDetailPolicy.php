<?php

namespace App\Policies;

use App\Models\LayananDetail;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LayananDetailPolicy
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
    public function view(User $user, LayananDetail $layanan_detail): bool
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
    public function update(User $user, LayananDetail $layanan_detail): bool
    {
        return $user->id === $layanan_detail->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, LayananDetail $layanan_detail): bool
    {
        return $user->id === $layanan_detail->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, LayananDetail $layanan_detail): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, LayananDetail $layanan_detail): bool
    {
        return false;
    }
}
