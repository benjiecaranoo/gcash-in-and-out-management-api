<?php

namespace App\Observers;

use App\Enums\Role;
use App\Models\User;
use Spatie\Permission\Models\Role as SpatieRole;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        // check if the default role is exist in our db
        if(SpatieRole::whereName(Role::default()->count() > 0) {
            // If the user does'nt have any role
            // Set the user default role
            if($user->roles()->count() == 0) {
                $user->assignRole(Role::default());
            }
        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
