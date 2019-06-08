<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeNewResource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:newresource {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new resource model, migration, policy, and nova resource.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        
        Artisan::call('make:model '.$name.' -m');
        Artisan::call('make:policy '.$name.'Policy --model '.$name);
        Artisan::call('nova:resource '.$name);
        
        $this->info('Resource classes created successfully.');
    }
}
