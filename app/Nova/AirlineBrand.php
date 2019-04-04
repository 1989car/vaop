<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Ctessier\NovaAdvancedImageField\AdvancedImage;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;

class AirlineBrand extends Resource
{
    use DisplaysInResourceGroupMenu;
    
    public static $displayInNavigation = false;
    public static $group = 'Reference';
    public static $subGroup = 'Airline';
    
    public static $model = 'App\Models\AirlineBrand';
    public static $title = 'name';
    public static $search = [
        'name',
    ];
    
    public static function label() {
        return 'Brands';
    }
    
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
    
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
    
            AdvancedImage::make('Logo', 'logo_url')
                ->disk('uploads')
                ->croppable(),
    
            AdvancedImage::make('Icon', 'icon_url')
                ->disk('uploads')
                ->resize(128, 128)
                ->croppable(),
            
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
