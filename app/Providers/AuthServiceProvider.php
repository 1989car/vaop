<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Achievement' => 'App\Policies\AchievementPolicy',
        'App\Models\AircraftFamilies' => 'App\Policies\AircraftFamilyPolicy',
        'App\Models\AircraftManufacturer' => 'App\Policies\AircraftManufacturerPolicy',
        'App\Models\AircraftType' => 'App\Policies\AircraftTypePolicy',
        'App\Models\AirlineBrand' => 'App\Policies\AirlineBrandPolicy',
        'App\Models\AirlineOperator' => 'App\Policies\AirlineOperatorPolicy',
        'App\Models\Airport' => 'App\Policies\AirportPolicy',
        'App\Models\Badge' => 'App\Policies\BadgePolicy',
        'App\Models\CityPair' => 'App\Policies\CityPairPolicy',
        'App\Models\Continent' => 'App\Policies\ContinentPolicy',
        'App\Models\Country' => 'App\Policies\CountryPolicy',
        'App\Models\MetroArea' => 'App\Policies\MetroAreaPolicy',
        'App\Models\Notam' => 'App\Policies\NotamPolicy',
        'App\Models\Reservation' => 'App\Policies\ReservationPolicy',
        'Spatie\Permission\Models\Role' => 'App\Policies\RolePolicy',
        'Spatie\Permission\Models\Permission' => 'App\Policies\PermissionPolicy',
        'App\Models\Subdivision' => 'App\Policies\SubdivisionPolicy',
        'App\Models\Timetable' => 'App\Policies\TimetablePolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    
        Passport::routes();
    
        // Implicitly grant "SuperAdmin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::before(function ($user, $ability) {
            return $user->hasRole('SuperAdmin') ? true : null;
        });
    }
}
