<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Subdivision;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubdivisionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any subdivision.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('geography:subdivision:view');
    }

    /**
     * Determine whether the user can view the subdivision.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subdivision  $subdivision
     * @return mixed
     */
    public function view(User $user, Subdivision $subdivision)
    {
        return $user->can('geography:subdivision:view');
    }

    /**
     * Determine whether the user can create subdivisions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('geography:subdivision:create');
    }

    /**
     * Determine whether the user can update the subdivision.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subdivision  $subdivision
     * @return mixed
     */
    public function update(User $user, Subdivision $subdivision)
    {
        return $user->can('geography:subdivision:update');
    }

    /**
     * Determine whether the user can delete the subdivision.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subdivision  $subdivision
     * @return mixed
     */
    public function delete(User $user, Subdivision $subdivision)
    {
        return $user->can('geography:subdivision:delete');
    }

    /**
     * Determine whether the user can restore the subdivision.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subdivision  $subdivision
     * @return mixed
     */
    public function restore(User $user, Subdivision $subdivision)
    {
        return $user->can('geography:subdivision:restore');
    }

    /**
     * Determine whether the user can permanently delete the subdivision.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subdivision  $subdivision
     * @return mixed
     */
    public function forceDelete(User $user, Subdivision $subdivision)
    {
        return $user->can('geography:subdivision:forcedelete');
    }
}
