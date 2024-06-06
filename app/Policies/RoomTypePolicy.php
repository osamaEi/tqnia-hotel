<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use App\Models\RoomType;
use Illuminate\Auth\Access\Response;

class RoomTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny($user): bool
    {
        // Check if the user is an admin or an employee
        if ($user instanceof Admin ) {
            return true;
        }

        // Otherwise, deny access
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RoomType $roomType): bool
    {
        // Check if the user is an admin or an employee
        if ($user instanceof \App\Models\Admin ) {
            return true;
        }

        // Otherwise, deny access
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RoomType $roomType): bool
    {
        if ($user === null) {
            abort(403, 'Unauthorized action: You must be logged in to update a room.');
        }

        if (!$user instanceof Admin) {
            abort(403, 'Unauthorized action: Only admins can update a room.');
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete($user, RoomType $roomtype)
    {
        if ($user === null) {
            abort(403, 'Unauthorized action: You must be logged in to delete a room.');
        }

        if (!$user instanceof Admin) {
            abort(403, 'Unauthorized action: Only admins can delete a room.');
        }

        return true;
    }
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RoomType $roomType): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RoomType $roomType): bool
    {
        //
    }
}
