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

class AircraftFamily extends Resource
{
    use DisplaysInResourceGroupMenu;
    
    public static $displayInNavigation = false;
    public static $group = 'Operations';
    public static $subGroup = 'Aircraft';
    
    public static $model = 'App\Models\AircraftFamilies';
    public static $title = 'name';
    public static $search = [
        'name',
    ];
    
    public static function label() {
        return 'Families';
    }
    
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
    
            BelongsToMany::make('AircraftTypes'),
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
