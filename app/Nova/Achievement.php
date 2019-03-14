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

class Achievement extends Resource
{
    public static $group = 'Gamification';
    public static $model = 'App\Models\Achievement';
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
            
            Image::make('Icon', 'icon_url')
                ->disk('uploads'),
    
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
