<?php

namespace App\Nova;

use App\Enums\ReservationStatus;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;

class Reservation extends Resource
{
    use DisplaysInResourceGroupMenu;
    
    public static $displayInNavigation = false;
    public static $group = 'Operations';
    public static $subGroup = 'Flight';
    
    public static $model = 'App\Models\Reservation';
    public static $search = [
    
    ];
    
    public function title()
    {
        return $this->timetable->airlineoperator->iata.$this->timetable->number.' ('.$this->timetable->citypair->origin->icao.'-'.$this->timetable->citypair->destination->icao.')';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            
            BelongsTo::make('User')
                ->rules('required')
                ->sortable()
                ->searchable(),
    
            BelongsTo::make('Timetable')
                ->rules('required')
                ->sortable()
                ->searchable(),
            
            DateTime::make('Planned Departure', 'planned_departure')
                ->rules('required')
                ->sortable(),
    
            Select::make('Status')
                ->options(ReservationStatus::toSelectArray())
                ->sortable()
                ->rules('required')
                ->hideWhenCreating(),
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
