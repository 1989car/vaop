<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityPair extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'virtualairline_id',
        'origin_airport_id',
        'destination_airport_id',
    ];
    
    function destination()
    {
        return $this->belongsTo('App\Models\Airport','destination_airport_id','id');
    }
    
    function origin()
    {
        return $this->belongsTo('App\Models\Airport','origin_airport_id','id');
    }
    
    function timetables()
    {
        return $this->hasMany('App\Models\Timetable', 'citypair_id', 'id');
    }
    
    function virtualairline()
    {
        return $this->belongsTo('App\Models\VirtualAirline','virtualairline_id','id');
    }
}
