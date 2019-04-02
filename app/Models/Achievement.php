<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Achievement extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'description',
        'icon_url',
        'dql',
    ];
    
    function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_achievements','achievement_id','user_id');
    }
}
