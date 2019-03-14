<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class AircraftType extends Resource
{
    public static $group = 'Aircraft';
    public static $model = 'App\Models\AircraftType';
    public static $title = 'name';
    public static $search = [
        'model',
    ];
    
    public static function label() {
        return 'Types';
    }
    
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('AircraftManufacturer')->searchable(),
            
            ID::make()->sortable(),
            
            Text::make('Model')
                ->sortable()
                ->rules('required', 'max:255'),
            
            Text::make('Type')
                ->sortable()
                ->rules('required', 'max:255'),
            
            Text::make('Engine Type', 'engine_type')
                ->sortable()
                ->rules('required', 'max:255'),
            
            Number::make('Engine Count', 'engine_count')
                ->sortable()
                ->rules('required', 'max:1'),
            
            Text::make('Weight Class', 'wtc')
                ->sortable()
                ->rules('required', 'max:1'),
            
            BelongsToMany::make('AircraftFamilies'),
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
