<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AirlineOperator;
use Illuminate\Auth\Access\HandlesAuthorization;

class AirlineOperatorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any airline operator.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('airline:operator:view');
    }

    /**
     * Determine whether the user can view the airline operator.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineOperator  $airlineOperator
     * @return mixed
     */
    public function view(User $user, AirlineOperator $airlineOperator)
    {
        return $user->can('airline:operator:view');
    }

    /**
     * Determine whether the user can create airline operators.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('airline:operator:create');
    }

    /**
     * Determine whether the user can update the airline operator.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineOperator  $airlineOperator
     * @return mixed
     */
    public function update(User $user, AirlineOperator $airlineOperator)
    {
        return $user->can('airline:operator:update');
    }

    /**
     * Determine whether the user can delete the airline operator.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineOperator  $airlineOperator
     * @return mixed
     */
    public function delete(User $user, AirlineOperator $airlineOperator)
    {
        return $user->can('airline:operator:delete');
    }

    /**
     * Determine whether the user can restore the airline operator.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineOperator  $airlineOperator
     * @return mixed
     */
    public function restore(User $user, AirlineOperator $airlineOperator)
    {
        return $user->can('airline:operator:restore');
    }

    /**
     * Determine whether the user can permanently delete the airline operator.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AirlineOperator  $airlineOperator
     * @return mixed
     */
    public function forceDelete(User $user, AirlineOperator $airlineOperator)
    {
        return $user->can('airline:operator:forcedelete');
    }
}
