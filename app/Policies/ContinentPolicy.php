<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Continent;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContinentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any continent.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('geography:continent:view');
    }

    /**
     * Determine whether the user can view the continent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Continent  $continent
     * @return mixed
     */
    public function view(User $user, Continent $continent)
    {
        return $user->can('geography:continent:view');
    }

    /**
     * Determine whether the user can create continents.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('geography:continent:create');
    }

    /**
     * Determine whether the user can update the continent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Continent  $continent
     * @return mixed
     */
    public function update(User $user, Continent $continent)
    {
        return $user->can('geography:continent:update');
    }

    /**
     * Determine whether the user can delete the continent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Continent  $continent
     * @return mixed
     */
    public function delete(User $user, Continent $continent)
    {
        return $user->can('geography:continent:delete');
    }

    /**
     * Determine whether the user can restore the continent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Continent  $continent
     * @return mixed
     */
    public function restore(User $user, Continent $continent)
    {
        return $user->can('geography:continent:restore');
    }

    /**
     * Determine whether the user can permanently delete the continent.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Continent  $continent
     * @return mixed
     */
    public function forceDelete(User $user, Continent $continent)
    {
        return $user->can('geography:continent:forcedelete');
    }
}
