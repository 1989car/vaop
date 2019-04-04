<?php

namespace App\Jobs;

use App\Models\Continent;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImportContinents implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $description = "Imports continent data from VAOP reference dataset (duplicates are syncronized).";
    public $api_endpoint = "https://reference.vaop.flightsim.aero/geography/continents.json";

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
        
        foreach($data as $code => $name){
            $continent = Continent::where('code','=',$code)->first();
            if(!$continent){
                $continent = new Continent();
                $continent->name = $name;
                $continent->code = $code;
                $continent->save();
                continue;
            }
            
            if($continent->allow_sync){
                $continent->name = $name;
                $continent->save();
                continue;
            }
        }
    }
}
