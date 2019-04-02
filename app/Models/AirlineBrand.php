<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirlineBrand extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'logo_url',
        'icon_url',
    ];
    
    function airlineoperators()
    {
        return $this->hasMany('App\Models\AirlineOperator','id','airlineoperator_id');
    }
}
