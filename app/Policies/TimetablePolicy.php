<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Timetable;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimetablePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any timetable.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('schedules:timetable:view');
    }

    /**
     * Determine whether the user can view the timetable.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timetable  $timetable
     * @return mixed
     */
    public function view(User $user, Timetable $timetable)
    {
        return $user->can('schedules:timetable:view');
    }

    /**
     * Determine whether the user can create timetables.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('schedules:timetable:create');
    }

    /**
     * Determine whether the user can update the timetable.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timetable  $timetable
     * @return mixed
     */
    public function update(User $user, Timetable $timetable)
    {
        return $user->can('schedules:timetable:update');
    }

    /**
     * Determine whether the user can delete the timetable.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timetable  $timetable
     * @return mixed
     */
    public function delete(User $user, Timetable $timetable)
    {
        return $user->can('schedules:timetable:delete');
    }

    /**
     * Determine whether the user can restore the timetable.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timetable  $timetable
     * @return mixed
     */
    public function restore(User $user, Timetable $timetable)
    {
        return $user->can('schedules:timetable:restore');
    }

    /**
     * Determine whether the user can permanently delete the timetable.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Timetable  $timetable
     * @return mixed
     */
    public function forceDelete(User $user, Timetable $timetable)
    {
        return $user->can('schedules:timetable:forcedelete');
    }
}
