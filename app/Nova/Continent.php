<?php

namespace App\Nova;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Continent extends Resource
{
    public static $group = 'Geography';
    public static $model = 'App\Models\Continent';
    public static $title = 'name';
    public static $search = [
        'code',
        'name',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
    
            Text::make('Code')
                ->sortable()
                ->rules('required', 'max:255'),
    
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
    
            HasMany::make('Countries'),
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
