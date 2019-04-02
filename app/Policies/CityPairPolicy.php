<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CityPair;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPairPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any city pair.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('schedules:citypair:view');
    }
    
    /**
     * Determine whether the user can view the city pair.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CityPair  $cityPair
     * @return mixed
     */
    public function view(User $user, CityPair $cityPair)
    {
        return $user->can('schedules:citypair:view');
    }

    /**
     * Determine whether the user can create city pairs.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('schedules:citypair:create');
    }

    /**
     * Determine whether the user can update the city pair.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CityPair  $cityPair
     * @return mixed
     */
    public function update(User $user, CityPair $cityPair)
    {
        return $user->can('schedules:citypair:update');
    }

    /**
     * Determine whether the user can delete the city pair.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CityPair  $cityPair
     * @return mixed
     */
    public function delete(User $user, CityPair $cityPair)
    {
        return $user->can('schedules:citypair:delete');
    }

    /**
     * Determine whether the user can restore the city pair.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CityPair  $cityPair
     * @return mixed
     */
    public function restore(User $user, CityPair $cityPair)
    {
        return $user->can('schedules:citypair:restore');
    }

    /**
     * Determine whether the user can permanently delete the city pair.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CityPair  $cityPair
     * @return mixed
     */
    public function forceDelete(User $user, CityPair $cityPair)
    {
        return $user->can('schedules:citypair:forcedelete');
    }
}
