<?php

namespace App\Nova;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;

class VirtualAirline extends Resource
{
    public static $group = 'Virtual Airlines';
    public static $model = 'App\Models\VirtualAirline';
    public static $title = 'name';
    public static $search = [
        'name',
    ];
    
    public static function label() {
        return 'Virtual Airlines';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
    
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
    
            HasMany::make('AirlineBrands'),
            
            HasMany::make('Achievements'),
            
            HasMany::make('Badges'),
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
