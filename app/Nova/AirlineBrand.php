<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class AirlineBrand extends Resource
{
    public static $group = 'Airlines';
    public static $model = 'App\Models\AirlineBrand';
    public static $title = 'name';
    public static $search = [
        'name',
    ];
    
    public static function label() {
        return 'Brands';
    }
    
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->whereIn('virtualairline_id', auth()->user()->va_role_ids());
    }

    public function fields(Request $request)
    {
        return [
            BelongsTo::make('VirtualAirline'),
            
            ID::make()->sortable(),
    
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
    
            Image::make('Logo', 'logo_url')
                ->disk('uploads'),
    
            Image::make('Icon', 'icon_url')
                ->disk('uploads'),
            
            HasMany::make('AirlineOperators')
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
