<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;

class User extends Authenticatable implements BannableContract
{
    use Notifiable, SoftDeletes, HasRoles, Bannable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    function achievements()
    {
        return $this->belongsToMany('App\Models\Achievement', 'user_achievements','user_id','achievement_id');
    }
    
    function badges()
    {
        return $this->belongsToMany('App\Models\Badge', 'user_badges','user_id','badge_id');
    }
    
    function reservations()
    {
        return $this->hasMany('App\Models\Reservation','user_id','id');
    }
    
    function nextFlight()
    {
        return $this->hasMany('App\Models\Reservation','user_id','id')->orderBy('planned_departure','ASC')->first();
    }
    
    public function canImpersonate()
    {
        return auth()->user()->can('user:impersonate');
    }
}
