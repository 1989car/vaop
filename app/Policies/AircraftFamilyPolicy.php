<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AircraftFamilies;
use Illuminate\Auth\Access\HandlesAuthorization;

class AircraftFamilyPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any aircraft families.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('aircraft:family:view');
    }
    
    /**
     * Determine whether the user can view the aircraft family.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftFamilies  $aircraftFamily
     * @return mixed
     */
    public function view(User $user, AircraftFamilies $aircraftFamily)
    {
        return $user->can('aircraft:family:view');
    }
    
    /**
     * Determine whether the user can create aircraft families.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('aircraft:family:create');
    }
    
    /**
     * Determine whether the user can update the aircraft family.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftFamilies  $aircraftFamily
     * @return mixed
     */
    public function update(User $user, AircraftFamilies $aircraftFamily)
    {
        return $user->can('aircraft:family:update');
    }
    
    /**
     * Determine whether the user can delete the aircraft family.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftFamilies  $aircraftFamily
     * @return mixed
     */
    public function delete(User $user, AircraftFamilies $aircraftFamily)
    {
        return $user->can('aircraft:family:delete');
    }
    
    /**
     * Determine whether the user can restore the aircraft family.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftFamilies  $aircraftFamily
     * @return mixed
     */
    public function restore(User $user, AircraftFamilies $aircraftFamily)
    {
        return $user->can('aircraft:family:restore');
    }
    
    /**
     * Determine whether the user can permanently delete the aircraft family.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AircraftFamilies  $aircraftFamily
     * @return mixed
     */
    public function forceDelete(User $user, AircraftFamilies $aircraftFamily)
    {
        return $user->can('aircraft:family:forcedelete');
    }
}
