<?php

namespace App\Policies;

use App\Closter;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClosterPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ( $user->isAdmin())
        {
            return true;
        }
    }

    /**
     * Determine whether the user can view any closters.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the closter.
     *
     * @param  \App\User  $user
     * @param  \App\Closter  $closter
     * @return mixed
     */
    public function view(User $user, Closter $closter)
    {
        //
    }

    /**
     * Determine whether the user can create closters.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the closter.
     *
     * @param  \App\User  $user
     * @param  \App\Closter  $closter
     * @return mixed
     */
    public function update(User $user, Closter $closter)
    {
        //
    }

    /**
     * Determine whether the user can delete the closter.
     *
     * @param  \App\User  $user
     * @param  \App\Closter  $closter
     * @return mixed
     */
    public function delete(User $user, Closter $closter)
    {
        //
    }

    /**
     * Determine whether the user can restore the closter.
     *
     * @param  \App\User  $user
     * @param  \App\Closter  $closter
     * @return mixed
     */
    public function restore(User $user, Closter $closter)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the closter.
     *
     * @param  \App\User  $user
     * @param  \App\Closter  $closter
     * @return mixed
     */
    public function forceDelete(User $user, Closter $closter)
    {
        //
    }
}
