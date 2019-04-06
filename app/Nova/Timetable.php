<?php

namespace App\Nova;

use App\Enums\DayOfWeekType;
use Fourstacks\NovaCheckboxes\Checkboxes;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Michielfb\Time\Time;
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;

class Timetable extends Resource
{
    use DisplaysInResourceGroupMenu;
    
    public static $displayInNavigation = false;
    public static $group = 'Operations';
    public static $subGroup = 'Schedule';
    
    public static $model = 'App\Models\Timetable';
    public static $search = [
        'number',
        'departure_time_utc',
        'arrival_time_utc',
    ];
    
    public function title()
    {
        return $this->airlineoperator->iata.$this->number.' ('.$this->citypair->origin->icao.'-'.$this->citypair->destination->icao.')';
    }
    
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('City Pair', 'CityPair')->searchable(),
            
            BelongsTo::make('Airline Operator', 'AirlineOperator')->searchable(),
            
            BelongsTo::make('Aircraft Family', 'AircraftFamily')->searchable(),
            
            Number::make('Number')
                ->sortable()
                ->rules('required', 'max:6'),
            
            Checkboxes::make('Days Operated', 'daysoperated')
                ->sortable()
                ->rules('required')
                ->options(DayOfWeekType::toSelectArray())
                ->saveUncheckedValues()
                ->displayUncheckedValuesOnDetail(),
    
            Time::make('Departure Time UTC', 'departure_time_utc')
                ->format('HH:mm')
                ->help('All times should be in UTC (GMT+0)')
                ->sortable(),
    
            Boolean::make('Flight Arrives Following Day','next_day')
                ->sortable(),
    
            Time::make('Arrival Time UTC', 'arrival_time_utc')
                ->format('HH:mm')
                ->help('All times should be in UTC (GMT+0)')
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
