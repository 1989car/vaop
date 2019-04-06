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
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;

class AircraftType extends Resource
{
    use DisplaysInResourceGroupMenu;
    
    public static $displayInNavigation = false;
    public static $group = 'Operations';
    public static $subGroup = 'Aircraft';
    
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
            BelongsTo::make('Aircraft Manufacturer', 'AircraftManufacturer')->searchable(),
            
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
            
            BelongsToMany::make('Aircraft Families', 'AircraftFamilies'),
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
