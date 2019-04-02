<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Airport;
use Illuminate\Auth\Access\HandlesAuthorization;

class AirportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any airport.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Airport  $airport
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('airport:view');
    }
    
    /**
     * Determine whether the user can view the airport.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Airport  $airport
     * @return mixed
     */
    public function view(User $user, Airport $airport)
    {
        return $user->can('airport:view');
    }

    /**
     * Determine whether the user can create airports.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('airport:create');
    }

    /**
     * Determine whether the user can update the airport.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Airport  $airport
     * @return mixed
     */
    public function update(User $user, Airport $airport)
    {
        return $user->can('airport:update');
    }

    /**
     * Determine whether the user can delete the airport.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Airport  $airport
     * @return mixed
     */
    public function delete(User $user, Airport $airport)
    {
        return $user->can('airport:delete');
    }

    /**
     * Determine whether the user can restore the airport.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Airport  $airport
     * @return mixed
     */
    public function restore(User $user, Airport $airport)
    {
        return $user->can('airport:restore');
    }

    /**
     * Determine whether the user can permanently delete the airport.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Airport  $airport
     * @return mixed
     */
    public function forceDelete(User $user, Airport $airport)
    {
        return $user->can('airport:forcedelete');
    }
}
