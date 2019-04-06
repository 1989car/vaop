<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;

class Notam extends Resource
{
    use DisplaysInResourceGroupMenu;
    
    public static $displayInNavigation = false;
    public static $group = 'Operations';
    public static $subGroup = 'Advisories';
    
    public static $model = 'App\Models\Notam';
    public static $title = 'title';
    public static $search = [
        'title',
        'body',
    ];
    
    public static function label() {
        return 'NOTAMs';
    }
    
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('Airport')
                ->searchable()
                ->nullable(),
            
            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),
            
            Text::make('Code')
                ->sortable()
                ->rules('required', 'max:255'),
            
            Textarea::make('Body')
                ->sortable()
                ->rules('required'),
    
            Boolean::make('Active')
                ->sortable(),
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
