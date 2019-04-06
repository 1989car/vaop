<?php

namespace App\Jobs;

use App\Models\AircraftManufacturer;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImportAircraftManufacturers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $description = "Imports Aircraft Manufacturer data from VAOP reference dataset (duplicates are synchronized).";
    public $api_endpoint = "https://reference.vaop.flightsim.aero/aircraft/manufacturers.json";

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
            $manufacturer = AircraftManufacturer::where('code','=',$datum->code)->first();
            if(!$manufacturer){
                $manufacturer = new AircraftManufacturer();
                $manufacturer->name = $datum->name;
                $manufacturer->code = $datum->code;
                $manufacturer->save();
                continue;
            }
            
            if($manufacturer->allow_sync){
                $manufacturer->name = $datum->name;
                $manufacturer->save();
                continue;
            }
        }
    }
}
