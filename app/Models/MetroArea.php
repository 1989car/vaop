<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetroArea extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'subdivision_id',
        'code',
        'name',
    ];
    
    function airports()
    {
        return $this->hasMany('App\Models\Airport','metroarea_id','id');
    }
    
    function subdivision()
    {
        return $this->belongsTo('App\Models\Subdivision','subdivision_id','id');
    }
}
