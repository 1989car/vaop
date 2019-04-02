<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Achievement;
use Illuminate\Auth\Access\HandlesAuthorization;

class AchievementPolicy
{
    use HandlesAuthorization;
    
     * Determine whether the user can view any achievement.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('gamification:achievement:view');
    }
    
    /**
     * Determine whether the user can view the achievement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Achievement  $achievement
     * @return mixed
     */
    public function view(User $user, Achievement $achievement)
    {
        return $user->can('gamification:achievement:view');
    }

    /**
     * Determine whether the user can create achievements.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('gamification:achievement:create');
    }

    /**
     * Determine whether the user can update the achievement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Achievement  $achievement
     * @return mixed
     */
    public function update(User $user, Achievement $achievement)
    {
        return $user->can('gamification:achievement:update');
    }

    /**
     * Determine whether the user can delete the achievement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Achievement  $achievement
     * @return mixed
     */
    public function delete(User $user, Achievement $achievement)
    {
        return $user->can('gamification:achievement:delete');
    }

    /**
     * Determine whether the user can restore the achievement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Achievement  $achievement
     * @return mixed
     */
    public function restore(User $user, Achievement $achievement)
    {
        return $user->can('gamification:achievement:restore');
    }

    /**
     * Determine whether the user can permanently delete the achievement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Achievement  $achievement
     * @return mixed
     */
    public function forceDelete(User $user, Achievement $achievement)
    {
        return $user->can('gamification:achievement:forcedelete');
    }
}
