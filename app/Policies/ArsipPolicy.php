<?php

namespace App\Policies;

use App\User;
use App\Arsip;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArsipPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the arsip.
     *
     * @param  \App\User  $user
     * @param  \App\Arsip  $arsip
     * @return mixed
     */
    public function view(User $user, Arsip $arsip)
    {
        //
    }

    /**
     * Determine whether the user can create arsips.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return Auth()->user()->isAdmin();
    }

    /**
     * Determine whether the user can update the arsip.
     *
     * @param  \App\User  $user
     * @param  \App\Arsip  $arsip
     * @return mixed
     */
    public function update(User $user, Arsip $arsip)
    {
        //
    }

    /**
     * Determine whether the user can delete the arsip.
     *
     * @param  \App\User  $user
     * @param  \App\Arsip  $arsip
     * @return mixed
     */
    public function delete(User $user, Arsip $arsip)
    {
        //
    }

    /**
     * Determine whether the user can restore the arsip.
     *
     * @param  \App\User  $user
     * @param  \App\Arsip  $arsip
     * @return mixed
     */
    public function restore(User $user, Arsip $arsip)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the arsip.
     *
     * @param  \App\User  $user
     * @param  \App\Arsip  $arsip
     * @return mixed
     */
    public function forceDelete(User $user, Arsip $arsip)
    {
        //
    }
}
