<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AircraftType extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'manufacturer_id',
        'model',
        'type',
        'engine_type',
        'engine_count',
        'wtc',
    ];
    
    function aircraftfamilies()
    {
        return $this->belongsToMany('App\Models\AircraftFamilies', 'aircraft_family_types','type_id','family_id');
    }
    
    function aircraftmanufacturer()
    {
        return $this->belongsTo('App\Models\AircraftManufacturer','manufacturer_id','id');
    }
}
