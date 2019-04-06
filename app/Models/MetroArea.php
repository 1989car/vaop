<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetroArea extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'country_id',
        'name',
        'allow_sync',
    ];
    
    protected $casts = [
        'allow_sync' => 'boolean',
    ];
    
    function airports()
    {
        return $this->hasMany('App\Models\Airport','metroarea_id','id');
    }
    
    function country()
    {
        return $this->belongsTo('App\Models\Country','country_id','id');
    }
}
