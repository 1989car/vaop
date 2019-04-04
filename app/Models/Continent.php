<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Continent extends Model
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
    
    function countries()
    {
        return $this->hasMany('App\Models\Country','continent_id','id');
    }
}
