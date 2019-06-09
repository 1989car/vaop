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
        ];
        
        foreach($default_settings as $name => $value){
            $setting = \Junaidnasir\GlobalSettings\Models\GlobalSettingsModel::where('name','=',$name)->get();
            if($setting == null){
                \Junaidnasir\GlobalSettings\Models\GlobalSettingsModel::upateOrCreate(
                    [
                        'name' => $value,
                    ],
                    [
                        'name' => $value,
                    ]
                );
            }
        }
    }
}
