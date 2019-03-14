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
        return $user->can('aircraft:family:view');
    }

    public function view(User $user, AircraftFamilies $aircraftFamily)
    {
        if(!in_array($aircraftFamily->virtualairline_id, auth()->user()->va_role_ids())){
            return null;
        }
        
        return $user->can('aircraft:family:view');
    }

    public function create(User $user)
    {
        return $user->can('aircraft:family:create');
    }

    public function update(User $user, AircraftFamilies $aircraftFamily)
    {
        if(!in_array($aircraftFamily->virtualairline_id, auth()->user()->va_role_ids())){
            return null;
        }
        
        return $user->can('aircraft:family:update');
    }

    public function delete(User $user, AircraftFamilies $aircraftFamily)
    {
        if(!in_array($aircraftFamily->virtualairline_id, auth()->user()->va_role_ids())){
            return null;
        }
        
        return $user->can('aircraft:family:delete');
    }

    public function restore(User $user, AircraftFamilies $aircraftFamily)
    {
        if(!in_array($aircraftFamily->virtualairline_id, auth()->user()->va_role_ids())){
            return null;
        }
        
        return $user->can('aircraft:family:restore');
    }

    public function forceDelete(User $user, AircraftFamilies $aircraftFamily)
    {
        //
    }
}
