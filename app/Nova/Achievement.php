<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Ctessier\NovaAdvancedImageField\AdvancedImage;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;

class Achievement extends Resource
{
    use DisplaysInResourceGroupMenu;
    
    public static $displayInNavigation = false;
    public static $group = 'Community';
    public static $subGroup = 'Gamification';
    
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
            ID::make()->sortable(),
    
            Text::make('Name')
                ->sortable(),
    
            Textarea::make('Description')
                ->sortable(),
    
            AdvancedImage::make('Icon', 'icon_url')
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
