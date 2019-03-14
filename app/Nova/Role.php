<?php

namespace App\Nova;

use Illuminate\Validation\Rule;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Nova;
use Spatie\Permission\PermissionRegistrar;

class Role extends Resource
{
    public static $group = 'Permissions';
    public static $model = 'App\Models\Role';
    public static $title = 'name';
    public static $search = [
        'name',
        'guard_name',
        'description',
    ];
    
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->whereIn('virtualairline_id', auth()->user()->va_role_ids());
    }
    
    public function fields(Request $request)
    {
        $guardOptions = collect(config('auth.guards'))->mapWithKeys(function ($value, $key) {
            return [$key => $key];
        });
        
        return [
            BelongsTo::make('VirtualAirline')->searchable(),
            
            ID::make()->sortable(),
            
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255')
                ->creationRules('unique:' . config('permission.table_names.roles'))
                ->updateRules('unique:' . config('permission.table_names.roles') . ',name,{{resourceId}}'),
            
            Text::make('Description')
                ->sortable()
                ->rules('max:255'),
            
            Select::make('Interface', 'guard_name')
                ->sortable()
                ->options($guardOptions->toArray())
                ->rules(['required', Rule::in($guardOptions)]),
    
            BelongsToMany::make('Permissions')->searchable(),
            
            MorphToMany::make('Users')->searchable(),
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
