<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notam extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'icao',
        'body',
        'active',
    ];
    
    function airport()
    {
        return $this->belongsTo('App\Models\Airport','icao','icao');
    }
}
