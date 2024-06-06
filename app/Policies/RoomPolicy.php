<?php

namespace App\Policies;

use App\Models\Room;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class RoomPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Room $room): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($user)
    {
        if ($user === null) {
            abort(403, 'Unauthorized action: You must be logged in to create a room.');
        }
    
        if (!$user instanceof Admin) {
            abort(403, 'Unauthorized action: Only admins can create a room.');
        }
    
        return true;
    }
    

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Room $room)
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
    public function delete($user, Room $room)
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
    public function restore(User $user, Room $room): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Room $room): bool
    {
        //
    }
}
