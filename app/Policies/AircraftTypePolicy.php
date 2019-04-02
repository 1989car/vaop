<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AircraftType;
use Illuminate\Auth\Access\HandlesAuthorization;

class AircraftTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any aircraft type.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('aircraft:type:view');
    }

    /**
     * Determine whether the user can view the aircraft type.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftType  $aircraftType
     * @return mixed
     */
    public function view(User $user, AircraftType $aircraftType)
    {
        return $user->can('aircraft:type:view');
    }

    /**
     * Determine whether the user can create aircraft types.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('aircraft:type:create');
    }

    /**
     * Determine whether the user can update the aircraft type.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftType  $aircraftType
     * @return mixed
     */
    public function update(User $user, AircraftType $aircraftType)
    {
        return $user->can('aircraft:type:update');
    }

    /**
     * Determine whether the user can delete the aircraft type.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftType  $aircraftType
     * @return mixed
     */
    public function delete(User $user, AircraftType $aircraftType)
    {
        return $user->can('aircraft:type:delete');
    }

    /**
     * Determine whether the user can restore the aircraft type.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftType  $aircraftType
     * @return mixed
     */
    public function restore(User $user, AircraftType $aircraftType)
    {
        return $user->can('aircraft:type:restore');
    }

    /**
     * Determine whether the user can permanently delete the aircraft type.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftType  $aircraftType
     * @return mixed
     */
    public function forceDelete(User $user, AircraftType $aircraftType)
    {
        return $user->can('aircraft:type:forcedelete');
    }
}
