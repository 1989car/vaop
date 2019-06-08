<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'timetable_id',
        'status',
        'planned_departure',
    ];
    
    protected $casts = [
        'planned_departure' => 'datetime',
    ];
    
    function timetable()
    {
        return $this->belongsTo('App\Models\Timetable','timetable_id','id');
    }
    
    function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
