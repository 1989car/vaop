<?php

namespace App\Nova;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

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
    
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->whereIn('id', auth()->user()->va_role_ids());
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
    
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
    
            Image::make('Logo', 'logo_url')
                ->disk('uploads'),
    
            Image::make('Icon', 'icon_url')
                ->disk('uploads'),
    
            Image::make('Banner', 'banner_url')
                ->disk('uploads'),
    
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
