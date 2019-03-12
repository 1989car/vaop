<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class CityPair extends Resource
{
    public static $group = 'Schedules';
    public static $model = 'App\Models\CityPair';
    public static $title = 'id';
    public static $search = [
    ];
    
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('VirtualAirline')->searchable(),
            
            ID::make()->sortable(),
            
            BelongsTo::make('Origin', 'origin', 'App\Nova\Airport')->searchable(),
    
            BelongsTo::make('Destination', 'destination' ,'App\Nova\Airport')->searchable(),
            
            HasMany::make('Timetables'),
        ];
    }
    
    public function cards(Request $request)
    {
        return [];
    }
    
    public function filters(Request $request)
    {
        return [];
    }
    
    public function lenses(Request $request)
    {
        return [];
    }
    
    public function actions(Request $request)
    {
        return [];
    }
}
