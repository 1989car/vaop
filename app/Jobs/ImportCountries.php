<?php

namespace App\Jobs;

use App\Models\Continent;
use App\Models\Country;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImportCountries implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $description = "Imports Country data from VAOP reference dataset (duplicates are synchronized).";
    public $api_endpoint = "https://reference.vaop.flightsim.aero/geography/countries.json";

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
            $continent = Continent::where('code','=',$datum->continent)->first();
            
            $country = Country::where('code','=',$code)->first();
            if(!$country){
                $country = new Country();
                $country->continent_id = $continent->id;
                $country->name = $datum->name;
                $country->code = $code;
                $country->save();
                continue;
            }
            
            if($country->allow_sync){
                $country->continent_id = $continent->id;
                $country->name = $datum->name;
                $country->save();
                continue;
            }
        }
    }
}
