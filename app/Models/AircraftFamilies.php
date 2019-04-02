<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AircraftFamilies extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
    ];
    
    function aircrafttypes()
    {
        return $this->belongsToMany('App\Models\AircraftType', 'aircraft_family_types','family_id','type_id');
    }
    
    function timetables()
    {
        return $this->hasMany('App\Model\Timetable','timetable_id','id');
    }
}
