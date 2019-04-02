<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AircraftManufacturer;
use Illuminate\Auth\Access\HandlesAuthorization;

class AircraftManufacturerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any aircraft manufacturer.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('aircraft:manufacturer:view');
    }

    /**
     * Determine whether the user can view the aircraft manufacturer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftManufacturer  $aircraftManufacturer
     * @return mixed
     */
    public function view(User $user, AircraftManufacturer $aircraftManufacturer)
    {
        return $user->can('aircraft:manufacturer:view');
    }

    /**
     * Determine whether the user can create aircraft manufacturers.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('aircraft:manufacturer:create');
    }

    /**
     * Determine whether the user can update the aircraft manufacturer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftManufacturer  $aircraftManufacturer
     * @return mixed
     */
    public function update(User $user, AircraftManufacturer $aircraftManufacturer)
    {
        return $user->can('aircraft:manufacturer:update');
    }

    /**
     * Determine whether the user can delete the aircraft manufacturer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftManufacturer  $aircraftManufacturer
     * @return mixed
     */
    public function delete(User $user, AircraftManufacturer $aircraftManufacturer)
    {
        return $user->can('aircraft:manufacturer:delete');
    }

    /**
     * Determine whether the user can restore the aircraft manufacturer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftManufacturer  $aircraftManufacturer
     * @return mixed
     */
    public function restore(User $user, AircraftManufacturer $aircraftManufacturer)
    {
        return $user->can('aircraft:manufacturer:restore');
    }

    /**
     * Determine whether the user can permanently delete the aircraft manufacturer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftManufacturer  $aircraftManufacturer
     * @return mixed
     */
    public function forceDelete(User $user, AircraftManufacturer $aircraftManufacturer)
    {
        return $user->can('aircraft:manufacturer:forcedelete');
    }
}
