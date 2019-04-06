<?php

namespace App\Nova;

use App\Enums\AirlineOperatorType;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Ctessier\NovaAdvancedImageField\AdvancedImage;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;

class AirlineOperator extends Resource
{
    use DisplaysInResourceGroupMenu;
    
    public static $displayInNavigation = false;
    public static $group = 'Reference';
    public static $subGroup = 'Airline';
    
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
            BelongsTo::make('Airline Brand', 'AirlineBrand'),
            
            BelongsTo::make('Country')->searchable(),
    
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
            
            Select::make('Type')
                ->options(AirlineOperatorType::toSelectArray())
                ->sortable()
                ->rules('required'),
    
            AdvancedImage::make('Logo', 'logo_url')
                ->help('Recommended Size: 250x60')
                ->disk('uploads')
                ->resize(null, 60)
                ->croppable(21/5),
    
            AdvancedImage::make('Icon', 'icon_url')
                ->help('Recommended Size: 128x128 pixels')
                ->disk('uploads')
                ->resize(128, 128)
                ->croppable(1/1),
            
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
