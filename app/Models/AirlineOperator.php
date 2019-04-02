<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirlineOperator extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'country_id',
        'airlinebrand_id',
        'name',
        'callsign',
        'iata',
        'icao',
        'type',
        'logo_url',
        'icon_url',
    ];
    
    function airlinebrand()
    {
        return $this->belongsTo('App\Models\AirlineBrand','airlinebrand_id','id');
    }
    
    function country()
    {
        return $this->belongsTo('App\Models\Country','country_id','id');
    }
    
    function timetables()
    {
        return $this->hasMany('App\Models\Timetable', 'airlineoperator_id','id');
    }
}
