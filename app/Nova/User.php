<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;

class User extends Resource
{
    public static $group = 'Users';
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
    
            BelongsToMany::make('Achievements')->searchable(),
    
            BelongsToMany::make('Badges')->searchable(),
    
            MorphToMany::make('Roles', 'roles', \Insenseanalytics\LaravelNovaPermission\Role::class),
            
            MorphToMany::make('Permissions', 'permissions', \Insenseanalytics\LaravelNovaPermission\Permission::class),
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
