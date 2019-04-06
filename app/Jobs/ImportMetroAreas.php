<?php

namespace App\Jobs;

use App\Models\Country;
use App\Models\MetroArea;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImportMetroAreas implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $description = "Imports MetroArea data from VAOP reference dataset (duplicates are synchronized).";
    public $api_endpoint = "https://reference.vaop.flightsim.aero/geography/metroareas.json";

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
        
        foreach($data as $code => $datum){
            if($datum->name == null || $datum->name == ''){
                continue;
            }
            
            $country = Country::where('code','=',$datum->country)->first();
            if(!$country){
                continue;
            }
            
            $metroarea = MetroArea::where('name','=',$datum->name)->first();
            if(!$metroarea){
                $metroarea = new MetroArea();
                $metroarea->country_id = $country->id;
                $metroarea->name = $datum->name;
                $metroarea->save();
                continue;
            }
            
            if($metroarea->allow_sync){
                $metroarea->country_id = $country->id;
                $metroarea->name = $datum->name;
                $metroarea->save();
                continue;
            }
        }
    }
}
