<?php

namespace App\Policies;

use App\Sua;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuaPolicy
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
     * Determine whether the user can view any suas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the sua.
     *
     * @param  \App\User  $user
     * @param  \App\Sua  $sua
     * @return mixed
     */
    public function view(User $user, Sua $sua)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create suas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isCliente() || $user->isAdmin();
    }

    /**
     * Determine whether the user can update the sua.
     *
     * @param  \App\User  $user
     * @param  \App\Sua  $sua
     * @return mixed
     */
    public function update(User $user, Sua $sua)
    {
        return $user->id === $sua->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the sua.
     *
     * @param  \App\User  $user
     * @param  \App\Sua  $sua
     * @return mixed
     */
    public function delete(User $user, Sua $sua)
    {
        return $user->id === $sua->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the sua.
     *
     * @param  \App\User  $user
     * @param  \App\Sua  $sua
     * @return mixed
     */
    public function restore(User $user, Sua $sua)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the sua.
     *
     * @param  \App\User  $user
     * @param  \App\Sua  $sua
     * @return mixed
     */
    public function forceDelete(User $user, Sua $sua)
    {
        //
    }
}
