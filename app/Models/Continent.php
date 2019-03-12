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
    ];
    
    function countries()
    {
        return $this->hasMany('App\Models\Country','id','country_id');
    }
}
