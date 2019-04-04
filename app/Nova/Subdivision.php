<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;

class Subdivision extends Resource
{
    use DisplaysInResourceGroupMenu;
    
    public static $displayInNavigation = false;
    public static $group = 'Reference';
    public static $subGroup = 'Geography';
    
    public static $model = 'App\Models\Subdivision';
    public static $title = 'name';
    public static $search = [
        'code',
        'name',
    ];
    
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('Country')->searchable(),
            
            ID::make()->sortable(),
            
            Text::make('Code')
                ->sortable()
                ->rules('required', 'max:255'),
            
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
            
            HasMany::make('MetroAreas'),
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
