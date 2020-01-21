<?php

namespace App\Policies;

use App\RecibosNomina;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecibosNominaPolicy
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
     * @param  \App\Closter  $recibosnomina
     * @return mixed
     */
    public function view(User $user, RecibosNomina $recibosnomina)
    {
        return $user->isCliente() || $user->isAdmin();
    }

    /**
     * Determine whether the user can create closters.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the closter.
     *
     * @param  \App\User  $user
     * @param  \App\Closter  $recibosnomina
     * @return mixed
     */
    public function update(User $user, RecibosNomina $recibosnomina)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the closter.
     *
     * @param  \App\User  $user
     * @param  \App\Closter  $recibosnomina
     * @return mixed
     */
    public function delete(User $user, RecibosNomina $recibosnomina)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the closter.
     *
     * @param  \App\User  $user
     * @param  \App\Closter  $recibosnomina
     * @return mixed
     */
    public function restore(User $user, RecibosNomina $recibosnomina)
    {
         return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the closter.
     *
     * @param  \App\User  $user
     * @param  \App\Closter  $recibosnomina
     * @return mixed
     */
    public function forceDelete(User $user, RecibosNomina $recibosnomina)
    {
        //
    }
}
