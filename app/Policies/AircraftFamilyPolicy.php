<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AircraftFamilies;
use Illuminate\Auth\Access\HandlesAuthorization;

class AircraftFamilyPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(User $user)
    {
        return $user->can('aircraft:family:viewany');
    }

    public function view(User $user, AircraftFamilies $aircraftFamily)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, AircraftFamilies $aircraftFamily)
    {
        //
    }

    public function delete(User $user, AircraftFamilies $aircraftFamily)
    {
        //
    }

    public function restore(User $user, AircraftFamilies $aircraftFamily)
    {
        //
    }

    public function forceDelete(User $user, AircraftFamilies $aircraftFamily)
    {
        //
    }
}
