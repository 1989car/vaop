<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    function virtualairline()
    {
        return $this->belongsTo('App\Models\VirtualAirline','virtualairline_id','id');
    }
}