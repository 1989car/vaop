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
    ];
    
    function airlineoperators()
    {
        return $this->hasMany('App\Models\AirlineOperator','country_id','id');
    }
    
    function continent()
    {
        return $this->belongsTo('App\Models\Continent','continent_id','id');
    }
    
    function subdivisions()
    {
        return $this->hasMany('App\Models\Subdivision','country_id','id');
    }
}
