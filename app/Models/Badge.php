<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Badge extends Model
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
        return $this->belongsToMany('App\Models\User', 'user_badges','badge_id','user_id');
    }
}
