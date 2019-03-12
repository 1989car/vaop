<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class MetroArea extends Resource
{
    public static $group = 'Geography';
    public static $model = 'App\Models\MetroArea';
    public static $title = 'name';
    public static $search = [
        'code',
        'name',
    ];
    
    public static function label() {
        return 'Metro Areas';
    }
    
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('Subdivision')->searchable(),
            
            ID::make()->sortable(),
            
            Text::make('Code')
                ->sortable()
                ->rules('required', 'max:255'),
            
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
            
            HasMany::make('Airports'),
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
