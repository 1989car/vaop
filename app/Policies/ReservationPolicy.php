<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any reservation.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('reservation:view');
    }

    /**
     * Determine whether the user can view the reservation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reservation  $reservation
     * @return mixed
     */
    public function view(User $user, Reservation $reservation)
    {
        return $user->can('reservation:view');
    }

    /**
     * Determine whether the user can create reservations.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('reservation:create');
    }

    /**
     * Determine whether the user can update the reservation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reservation  $reservation
     * @return mixed
     */
    public function update(User $user, Reservation $reservation)
    {
        return $user->can('reservation:update');
    }

    /**
     * Determine whether the user can delete the reservation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reservation  $reservation
     * @return mixed
     */
    public function delete(User $user, Reservation $reservation)
    {
        return $user->can('reservation:delete');
    }

    /**
     * Determine whether the user can restore the reservation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reservation  $reservation
     * @return mixed
     */
    public function restore(User $user, Reservation $reservation)
    {
        return $user->can('reservation:restore');
    }

    /**
     * Determine whether the user can permanently delete the reservation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reservation  $reservation
     * @return mixed
     */
    public function forceDelete(User $user, Reservation $reservation)
    {
        return $user->can('reservation:forcedelete');
    }
}
