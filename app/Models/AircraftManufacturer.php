<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AircraftManufacturer extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'code',
        'name',
        'allow_sync',
    ];
    
    protected $casts = [
        'allow_sync' => 'boolean',
    ];
    
    function aircrafttypes()
    {
        return $this->hasMany('App\Models\AircraftType','manufacturer_id','id');
    }
}
