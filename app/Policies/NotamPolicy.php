<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Notam;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotamPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any notam.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notam  $notam
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('notam:view');
    }

    /**
     * Determine whether the user can view the notam.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notam  $notam
     * @return mixed
     */
    public function view(User $user, Notam $notam)
    {
        return $user->can('notam:view');
    }

    /**
     * Determine whether the user can create notams.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('notam:create');
    }

    /**
     * Determine whether the user can update the notam.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notam  $notam
     * @return mixed
     */
    public function update(User $user, Notam $notam)
    {
        return $user->can('notam:update');
    }

    /**
     * Determine whether the user can delete the notam.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notam  $notam
     * @return mixed
     */
    public function delete(User $user, Notam $notam)
    {
        return $user->can('notam:delete');
    }

    /**
     * Determine whether the user can restore the notam.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notam  $notam
     * @return mixed
     */
    public function restore(User $user, Notam $notam)
    {
        return $user->can('notam:restore');
    }

    /**
     * Determine whether the user can permanently delete the notam.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notam  $notam
     * @return mixed
     */
    public function forceDelete(User $user, Notam $notam)
    {
        return $user->can('notam:forcedelete');
    }
}
