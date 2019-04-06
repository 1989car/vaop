<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;

class Timetable extends Resource
{
    use DisplaysInResourceGroupMenu;
    
    public static $displayInNavigation = false;
    public static $group = 'Operations';
    public static $subGroup = 'Schedule';
    
    public static $model = 'App\Models\Timetable';
    public static $title = 'id';
    public static $search = [
    ];
    
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('City Pair', 'CityPair')->searchable(),
            
            BelongsTo::make('Airline Operator', 'AirlineOperator')->searchable(),
            
            BelongsTo::make('Aircraft Family', 'AircraftFamily')->searchable(),
            
            ID::make()->sortable(),
            
            Number::make('Number')
                ->sortable()
                ->rules('required', 'max:6'),
    
            Text::make('Days Operated', 'daysoperated')
                ->sortable()
                ->rules('required', 'max:255'),
    
            Text::make('Departure Time UTC', 'departure_time_utc')
                ->sortable(),
    
            Text::make('Arrival Time UTC', 'arrival_time_utc')
                ->sortable(),
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
