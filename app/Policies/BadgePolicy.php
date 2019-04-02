<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Badge;
use Illuminate\Auth\Access\HandlesAuthorization;

class BadgePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any badge.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('gamification:badge:view');
    }

    /**
     * Determine whether the user can view the badge.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Badge  $badge
     * @return mixed
     */
    public function view(User $user, Badge $badge)
    {
        return $user->can('gamification:badge:view');
    }

    /**
     * Determine whether the user can create badges.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('gamification:badge:create');
    }

    /**
     * Determine whether the user can update the badge.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Badge  $badge
     * @return mixed
     */
    public function update(User $user, Badge $badge)
    {
        return $user->can('gamification:badge:update');
    }

    /**
     * Determine whether the user can delete the badge.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Badge  $badge
     * @return mixed
     */
    public function delete(User $user, Badge $badge)
    {
        return $user->can('gamification:badge:delete');
    }

    /**
     * Determine whether the user can restore the badge.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Badge  $badge
     * @return mixed
     */
    public function restore(User $user, Badge $badge)
    {
        return $user->can('gamification:badge:restore');
    }

    /**
     * Determine whether the user can permanently delete the badge.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Badge  $badge
     * @return mixed
     */
    public function forceDelete(User $user, Badge $badge)
    {
        return $user->can('gamification:badge:forcedelete');
    }
}
