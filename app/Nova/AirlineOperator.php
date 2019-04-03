<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Ctessier\NovaAdvancedImageField\AdvancedImage;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class AirlineOperator extends Resource
{
    public static $group = 'Airlines';
    public static $model = 'App\Models\AirlineOperator';
    public static $title = 'name';
    public static $search = [
        'name',
    ];
    
    public static function label() {
        return 'Operators';
    }
    
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('AirlineBrand'),
            
            BelongsTo::make('Country')->searchable(),
            
            ID::make()->sortable(),
    
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
    
            Text::make('Callsign')
                ->sortable()
                ->rules('required', 'max:50'),
    
            Text::make('IATA')
                ->sortable()
                ->rules('required', 'max:2'),
    
            Text::make('ICAO')
                ->sortable()
                ->rules('required', 'max:3'),
    
            Text::make('Type')
                ->sortable()
                ->rules('required', 'max:255'),
    
            AdvancedImage::make('Logo', 'logo_url')
                ->disk('uploads')
                ->croppable(),
    
            AdvancedImage::make('Icon', 'icon_url')
                ->disk('uploads')
                ->resize(128, 128)
                ->croppable(),
            
            HasMany::make('Timetables'),
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
