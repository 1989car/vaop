<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'continent_id',
        'code',
        'name',
        'allow_sync',
    ];
    
    protected $casts = [
        'allow_sync' => 'boolean',
    ];
    
    function airlineoperators()
    {
        return $this->hasMany('App\Models\AirlineOperator','country_id','id');
    }
    
    function continent()
    {
        return $this->belongsTo('App\Models\Continent','continent_id','id');
    }
    
    function metroarea()
    {
        return $this->hasMany('App\Models\MetroArea','country_id','id');
    }
}
