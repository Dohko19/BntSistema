<?php

namespace App\Policies;

use App\Eba;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EbaPolicy
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
     * Determine whether the user can view any ebas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the eba.
     *
     * @param  \App\User  $user
     * @param  \App\Eba  $eba
     * @return mixed
     */
    public function view(User $user, Eba $eba)
    {
        return $user->id === $eba->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can create ebas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isCliente() || $user->isAdmin();
    }

    /**
     * Determine whether the user can update the eba.
     *
     * @param  \App\User  $user
     * @param  \App\Eba  $eba
     * @return mixed
     */
    public function update(User $user, Eba $eba)
    {
        return $user->id === $eba->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the eba.
     *
     * @param  \App\User  $user
     * @param  \App\Eba  $eba
     * @return mixed
     */
    public function delete(User $user, Eba $eba)
    {
        return $user->id === $eba->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the eba.
     *
     * @param  \App\User  $user
     * @param  \App\Eba  $eba
     * @return mixed
     */
    public function restore(User $user, Eba $eba)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the eba.
     *
     * @param  \App\User  $user
     * @param  \App\Eba  $eba
     * @return mixed
     */
    public function forceDelete(User $user, Eba $eba)
    {
        //
    }
}
