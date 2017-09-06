<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Listen to the User saving event.
     *
     * @param  User  $user
     * @return void
     */
    public function saving(User $user)
    {
        \Log::info('Saving user: ' . $user);

        /// Password autohashing
        if ($user->isDirty('password')) {
            $user->password = \Hash::make($user->password);
        }
    }

    /**
     * Listen to the User saved event.
     *
     * @param  User $user
     * @return void
     */
    public function saved(User $user)
    {
        \Log::info('User saved: ' . $user);
    }
}
