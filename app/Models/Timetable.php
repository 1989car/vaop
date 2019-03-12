<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timetable extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'citypair_id',
        'airlineoperator_id',
        'aircraftfamily_id',
        'number',
        'daysoperated',
        'departure_time_utc',
        'arrival_time_utc',
    ];
    
    protected $casts = [
        'daysoperated' => 'array',
        'departure_time_utc' => 'time',
        'arrival_time_utc' => 'time',
    ];
    
    function aircraftfamily()
    {
        return $this->belongsTo('App\Models\AircraftFamilies','aircraftfamily_id','id');
    }
    
    function airlineoperator()
    {
        return $this->belongsTo('App\Models\AirlineOperator','airlineoperator_id','id');
    }
    
    function citypair()
    {
        return $this->belongsTo('App\Models\CityPair','citypair_id','id');
    }
}
