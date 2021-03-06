<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('inspire')->hourly()->withoutOverlapping()->onOneServer()->runInBackground();
        $schedule->job('App\Jobs\ImportContinents')->withoutOverlapping()->onOneServer()->runInBackground();
        $schedule->job('App\Jobs\ImportCountries')->withoutOverlapping()->onOneServer()->runInBackground();
        $schedule->job('App\Jobs\ImportMetroAreas')->withoutOverlapping()->onOneServer()->runInBackground();
        $schedule->job('App\Jobs\ImportAirports')->withoutOverlapping()->onOneServer()->runInBackground();
        $schedule->job('App\Jobs\ImportAircraftManufacturers')->withoutOverlapping()->onOneServer()->runInBackground();
        $schedule->job('App\Jobs\ImportAircraftTypes')->withoutOverlapping()->onOneServer()->runInBackground();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
