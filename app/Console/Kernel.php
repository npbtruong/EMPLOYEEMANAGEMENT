<?php

namespace App\Console;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        $schedule->call(function () {
            
                DB::table('users')->update(
                    [
                        "status" => 0,
                    ]
                );
            
        })->dailyAt('8:55') ->timezone('Asia/Ho_Chi_Minh');

        $schedule->call(function () {
            
            DB::table('users')->update(
                [
                    "attendence_record" => 0,
                ]
            );
        })->monthly();

       
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
