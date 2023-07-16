<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\ImportOpenFoodData;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
 

protected function schedule(Schedule $schedule)
{
    {
        $schedule->command('import:open-food-data')->dailyAt('03:00');
    }
    }

    protected $commands = [
        Commands\ImportOpenFoodData::class,
    ];
    
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    
    
    }

}




