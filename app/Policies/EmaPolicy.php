<?php

namespace App\Policies;

use App\Ema;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmaPolicy
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
     * Determine whether the user can view any emas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the ema.
     *
     * @param  \App\User  $user
     * @param  \App\Ema  $ema
     * @return mixed
     */
    public function view(User $user, Ema $ema)
    {
        return $user->id === $ema->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can create emas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isCliente() || $user->isAdmin();
    }

    /**
     * Determine whether the user can update the ema.
     *
     * @param  \App\User  $user
     * @param  \App\Ema  $ema
     * @return mixed
     */
    public function update(User $user, Ema $ema)
    {
        return $user->id === $ema->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the ema.
     *
     * @param  \App\User  $user
     * @param  \App\Ema  $ema
     * @return mixed
     */
    public function delete(User $user, Ema $ema)
    {
        return $user->id === $ema->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the ema.
     *
     * @param  \App\User  $user
     * @param  \App\Ema  $ema
     * @return mixed
     */
    public function restore(User $user, Ema $ema)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the ema.
     *
     * @param  \App\User  $user
     * @param  \App\Ema  $ema
     * @return mixed
     */
    public function forceDelete(User $user, Ema $ema)
    {
        //
    }
}
