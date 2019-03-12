<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Badge extends Resource
{
    public static $group = 'Gamification';
    public static $model = 'App\Models\Badge';
    public static $title = 'name';
    public static $search = [
        'name',
        'description',
        'dql',
    ];
    
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('VirtualAirline')->searchable(),
            
            ID::make()->sortable(),
    
            Text::make('Name')
                ->sortable(),
    
            Textarea::make('Description')
                ->sortable(),
    
            Image::make('Icon', 'icon_url'),
    
            Textarea::make('DQL')
                ->sortable(),
            
            BelongsToMany::make('Users')->searchable(),
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
