<?php

namespace App\Nova;

use Cog\Laravel\Nova\Ban\Actions\Ban;
use Cog\Laravel\Nova\Ban\Actions\Unban;
use KABBOUCHI\NovaImpersonate\Impersonate;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;

class User extends Resource
{
    use DisplaysInResourceGroupMenu;
    
    public static $displayInNavigation = true;
    public static $group = 'Community';
    public static $subGroup = 'User';
    
    public static $model = 'App\Models\User';
    public static $title = 'name';
    public static $search = [
        'name',
        'email',
    ];
    
    public static function label() {
        return 'Users';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Gravatar::make(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:6')
                ->updateRules('nullable', 'string', 'min:6'),
            
            // TODO: Add `is_staff` field management
            // TODO: Add `status` field management
    
            Impersonate::make($this),
    
            BelongsToMany::make('Achievements')->searchable(),
    
            BelongsToMany::make('Badges')->searchable(),
    
            MorphToMany::make('Roles', 'roles', \Vyuldashev\NovaPermission\Role::class),
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
        return [
            (new Ban)->canSee(function ($request) {
                return $request->user()->can('user:ban');
            })->canRun(function ($request) {
                return $request->user()->can('user:ban');
            }),
            (new Unban)->canSee(function ($request) {
                return $request->user()->can('user:ban');
            })->canRun(function ($request) {
                return $request->user()->can('user:ban');
            }),
        ];
    }
}
