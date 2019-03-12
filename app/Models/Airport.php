<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airport extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'metroarea_id',
        'name',
        'iata',
        'icao',
        'latitude',
        'longitude',
        'elevation',
    ];
    
    function citypair_destination()
    {
        return $this->belongsTo('App\Models\CityPairs','destination_airport_id','id');
    }
    
    function citypair_origin()
    {
        return $this->belongsTo('App\Models\CityPairs','origin_airport_id','id');
    }
    
    function metroarea()
    {
        return $this->belongsTo('App\Models\MetroArea','metroarea_id','id');
    }
}
