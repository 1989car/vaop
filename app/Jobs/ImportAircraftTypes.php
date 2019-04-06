<?php

namespace App\Jobs;

use App\Models\AircraftManufacturer;
use App\Models\AircraftType;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImportAircraftTypes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $description = "Imports Aircraft Type data from VAOP reference dataset (duplicates are synchronized).";
    public $api_endpoint = "https://reference.vaop.flightsim.aero/aircraft/types.json";

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = new Client();
        $result = $client->get($this->api_endpoint,[
            'headers' => [
                'User-Agent' => 'VAOP-'.env('APP_URL'),
            ],
        ]);
        
        $data = json_decode($result->getBody()->getContents());
        
        foreach($data as $datum){
            $manufacturer = AircraftManufacturer::where('name','=',$datum->ManufacturerCode)->first();
            if(!$manufacturer){
                continue;
            }
            
            if($datum->WTC == 'L/M'){
                $datum->WTC = 'M';
            }
            if($datum->EngineType == 'Turboprop/Turboshaft'){
                $datum->EngineType = 'Turboprop';
            }
            
            $type = AircraftType::where('model','=',$datum->ModelFullName)->first();
            if(!$type){
                $type = new AircraftType();
                $type->manufacturer_id = $manufacturer->id;
                $type->model = $datum->ModelFullName;
                $type->type = $datum->Description;
                $type->engine_type = strtolower($datum->EngineType);
                $type->engine_count = strtolower($datum->EngineCount);
                $type->wtc = $datum->WTC;
                $type->icao = $datum->Designator;
                $type->save();
                continue;
            }
            
            if($type->allow_sync){
                $type->manufacturer_id = $manufacturer->id;
                $type->type = $datum->Description;
                $type->engine_type = strtolower($datum->EngineType);
                $type->engine_count = strtolower($datum->EngineCount);
                $type->wtc = $datum->WTC;
                $type->icao = $datum->Designator;
                $type->save();
                continue;
            }
        }
    }
}
