<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VirtualAirline extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'banner_url',
        'icon_url',
        'logo_url',
    ];
    
    function achievements()
    {
        return $this->hasMany('App\Models\Achievement','virtualairline_id','id');
    }
    
    function badges()
    {
        return $this->hasMany('App\Models\Badge','virtualairline_id','id');
    }
    
    function airlinebrands()
    {
        return $this->hasMany('App\Models\AirlineBrand','virtualairline_id','id');
    }
}
