<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;

class Continent extends Resource
{
    use DisplaysInResourceGroupMenu;
    
    public static $displayInNavigation = false;
    public static $group = 'Reference';
    public static $subGroup = 'Geography';
    
    public static $model = 'App\Models\Continent';
    public static $title = 'name';
    public static $search = [
        'code',
        'name',
    ];

    public function fields(Request $request)
    {
        return [
            Text::make('Code')
                ->help('<span style="color:red;">WARNING: Editing this field may break future synchronizations</span>')
                ->sortable()
                ->rules('required', 'max:2'),
            
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
            
            Boolean::make('Allow Sync', 'allow_sync'),
    
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
