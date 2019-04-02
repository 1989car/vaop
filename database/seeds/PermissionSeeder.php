<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namespaces = [
            'aircraft:family',
            'aircraft:manufacturer',
            'aircraft:type',
            
            'airline:brand',
            'airline:operator',
            
            'airport',
            
            'auth:role',
            'auth:permission',
            
            'gamification:badge',
            'gamification:achievement',
            
            'geography:continent',
            'geography:country',
            'geography:metroarea',
            'geography:subdivision',
            
            'schedules:citypair',
            'schedules:timetable',
            
            'user',
        ];
        
        foreach($namespaces as $namespace){
            foreach(['view','create','update','delete','restore','forcedelete'] as $action){
                \Spatie\Permission\Models\Permission::updateOrCreate([
                    'name' => $namespace.':'.$action,
                    'guard' => 'web',
                ],[
                    'name' => $namespace.':'.$action,
                    'guard' => 'web',
                ]);
            }
        }
        
        $special_permissions = [
            'user:ban',
            'user:unban',
            'user:impersonate',
            
            'admin:access',
        ];
        
        foreach($special_permissions as $permission){
            \Spatie\Permission\Models\Permission::updateOrCreate([
                'name' => $permission,
                'guard' => 'web',
            ],[
                'name' => $permission,
                'guard' => 'web',
            ]);
        }
    }
}
