<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;

class Airport extends Resource
{
    use DisplaysInResourceGroupMenu;
    
    public static $displayInNavigation = false;
    public static $group = 'Reference';
    public static $subGroup = 'AIRAC';
    
    public static $model = 'App\Models\Airport';
    public static $title = 'name';
    public static $search = [
        'name',
        'iata',
        'icao',
        'latitude',
        'longitude',
        'elevation',
    ];
    
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('Metro Area', 'MetroArea')->searchable(),
            
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
    
            Text::make('IATA')
                ->sortable()
                ->rules('required', 'max:3|min:3'),
    
            Text::make('ICAO')
                ->sortable()
                ->rules('required', 'max:4|min:4'),
    
            Text::make('Latitude')
                ->sortable()
                ->rules('required', 'max:255'),
    
            Text::make('Longitude')
                ->sortable()
                ->rules('required', 'max:255'),
    
            Number::make('Elevation')
                ->sortable()
                ->rules('required', 'max:255'),
    
            HasMany::make('Notam'),
        ];
    }
    
    public function cards(Request $request)
    {
        return [];
    }
    
    public function filters(Request $request)
    {
        return [
            new Filters\MetroArea(),
        ];
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
