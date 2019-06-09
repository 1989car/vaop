<?php

namespace App\Models;

use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;

class User extends Authenticatable implements BannableContract, MustVerifyEmail
{
    use Notifiable, SoftDeletes, HasRoles, Bannable, HasApiTokens, Messagable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url',
        'is_staff',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    function getAvatarURLAttribute($value)
    {
        if($value !== null){
            return env('UPLOADS_BASE_URL').$value;
        }else{
            return "https://www.gravatar.com/avatar/".md5($this->email)."?s=60";
        }
    }
    
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
