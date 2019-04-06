<?php

namespace App\Jobs;

use App\Models\Airport;
use App\Models\MetroArea;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImportAirports implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $description = "Imports Airport data from VAOP reference dataset (duplicates are synchronized).";
    public $api_endpoint = "https://reference.vaop.flightsim.aero/airports.json";

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ini_set('memory_limit','1G');
        
        $client = new Client();
        $result = $client->get($this->api_endpoint,[
            'headers' => [
                'User-Agent' => 'VAOP-'.env('APP_URL'),
            ],
        ]);
        
        $data = json_decode($result->getBody()->getContents());
        
        foreach($data as $code => $datum){
            if($datum->icao == null || $datum->icao == ''){
                continue;
            }
            if($datum->name == null || $datum->name == ''){
                continue;
            }
            
            $metroarea = MetroArea::where('name','=',$datum->location->city)->first();
            if(!$metroarea){
                continue;
            }
            
            $airport = Airport::where('icao','=',$datum->icao)->first();
            if(!$airport){
                $airport = new Airport();
                $airport->metroarea_id = $metroarea->id;
                $airport->name = $datum->name;
                $airport->icao = $datum->icao;
                $airport->iata = $datum->iata;
                $airport->latitude = $datum->location->latitude;
                $airport->longitude = $datum->location->longitude;
                $airport->elevation = $datum->elevation;
                $airport->save();
                continue;
            }
            
            if($airport->allow_sync){
                $airport->metroarea_id = $metroarea->id;
                $airport->name = $datum->name;
                $airport->save();
                continue;
            }
        }
    }
}
