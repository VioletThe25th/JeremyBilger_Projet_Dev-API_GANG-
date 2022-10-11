<?php

namespace App\Policies;

use App\Models\Gang;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GangPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gang  $gang
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Gang $gang)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gang  $gang
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Gang $gang)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gang  $gang
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Gang $gang)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gang  $gang
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Gang $gang)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Gang  $gang
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Gang $gang)
    {
        //
    }
}
