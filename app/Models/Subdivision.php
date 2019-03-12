<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subdivision extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'country_id',
        'code',
        'name',
    ];
    
    function country()
    {
        return $this->belongsTo('App\Models\Country','country_id','id');
    }
    
    function metroareas()
    {
        return $this->hasMany('App\Models\MetroArea','subdivision_id','id');
    }
}
