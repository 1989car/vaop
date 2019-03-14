<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VirtualAirline;
use Illuminate\Auth\Access\HandlesAuthorization;

class VirtualAirlinePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, VirtualAirline $virtualAirline)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->can('virtualairline:create');
    }

    public function update(User $user, VirtualAirline $virtualAirline)
    {
        return $user->can('virtualairline:update');
    }

    public function delete(User $user, VirtualAirline $virtualAirline)
    {
        return $user->can('virtualairline:delete');
    }

    public function restore(User $user, VirtualAirline $virtualAirline)
    {
        return $user->can('virtualairline:restore');
    }

    public function forceDelete(User $user, VirtualAirline $virtualAirline)
    {
        //
    }
}
