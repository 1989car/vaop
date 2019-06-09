<?php

use Illuminate\Database\Seeder;

class GlobalSettingsDefaultSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_settings = [
            'rtl' => '0',
            'favicon' => '',
            'header-background-image' => '',
            'logo-full-dark' => '',
            'logo-small-dark' => '',
            'show-footer' => '1',
            'show-scrolltop' => '1',
            'logo-full-light' => '',
            'logo-small-light' => '',
            'site-title' => '',
            'copyright-block' => '',
            'registration' => 'closed',
            'external-background-image' => '',
            'login-block-title' => '',
            'login-block-description' => '',
            'color-brand' => '#5867dd',
            'color-primary' => '#5867dd',
            'color-primary-hover' => '#384ad7',
            'color-success' => '#d4edda',
            'color-info' => '#d1ecf1',
            'color-warning' => '#fff3cd',
            'color-danger' => '#f8d7da',
        ];
        
        foreach($default_settings as $name => $value){
            $setting = \Junaidnasir\GlobalSettings\Models\GlobalSettingsModel::where('name','=',$name)->first();
            if($setting == null){
                \Junaidnasir\GlobalSettings\Models\GlobalSettingsModel::updateOrCreate(
                    [
                        'name' => $name,
                        'value' => $value,
                    ],
                    [
                        'name' => $name,
                        'value' => $value,
                    ]
                );
            }
        }
    }
}
