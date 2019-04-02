<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AirlineBrand;
use Illuminate\Auth\Access\HandlesAuthorization;

class AirlineBrandPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any airline brand.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineBrand  $airlineBrand
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('airline:brand:view');
    }

    /**
     * Determine whether the user can view the airline brand.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineBrand  $airlineBrand
     * @return mixed
     */
    public function view(User $user, AirlineBrand $airlineBrand)
    {
        return $user->can('airline:brand:view');
    }

    /**
     * Determine whether the user can create airline brands.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('airline:brand:create');
    }

    /**
     * Determine whether the user can update the airline brand.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineBrand  $airlineBrand
     * @return mixed
     */
    public function update(User $user, AirlineBrand $airlineBrand)
    {
        return $user->can('airline:brand:update');
    }

    /**
     * Determine whether the user can delete the airline brand.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineBrand  $airlineBrand
     * @return mixed
     */
    public function delete(User $user, AirlineBrand $airlineBrand)
    {
        return $user->can('airline:brand:delete');
    }

    /**
     * Determine whether the user can restore the airline brand.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineBrand  $airlineBrand
     * @return mixed
     */
    public function restore(User $user, AirlineBrand $airlineBrand)
    {
        return $user->can('airline:brand:restore');
    }

    /**
     * Determine whether the user can permanently delete the airline brand.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineBrand  $airlineBrand
     * @return mixed
     */
    public function forceDelete(User $user, AirlineBrand $airlineBrand)
    {
        return $user->can('airline:brand:forcedelete');
    }
}
