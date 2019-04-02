<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MetroArea;
use Illuminate\Auth\Access\HandlesAuthorization;

class MetroAreaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any metro area.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('geography:metroarea:view');
    }

    /**
     * Determine whether the user can view the metro area.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MetroArea  $metroArea
     * @return mixed
     */
    public function view(User $user, MetroArea $metroArea)
    {
        return $user->can('geography:metroarea:view');
    }

    /**
     * Determine whether the user can create metro areas.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('geography:metroarea:create');
    }

    /**
     * Determine whether the user can update the metro area.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MetroArea  $metroArea
     * @return mixed
     */
    public function update(User $user, MetroArea $metroArea)
    {
        return $user->can('geography:metroarea:update');
    }

    /**
     * Determine whether the user can delete the metro area.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MetroArea  $metroArea
     * @return mixed
     */
    public function delete(User $user, MetroArea $metroArea)
    {
        return $user->can('geography:metroarea:delete');
    }

    /**
     * Determine whether the user can restore the metro area.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MetroArea  $metroArea
     * @return mixed
     */
    public function restore(User $user, MetroArea $metroArea)
    {
        return $user->can('geography:metroarea:restore');
    }

    /**
     * Determine whether the user can permanently delete the metro area.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MetroArea  $metroArea
     * @return mixed
     */
    public function forceDelete(User $user, MetroArea $metroArea)
    {
        return $user->can('geography:metroarea:forcedelete');
    }
}
