<?php

namespace App\Console;

use Log;
use App\Telegram\TelegramAPI;
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
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function () {
            $data['text'] = 'test';
            $api = TelegramAPI('212227548:AAE-5XX0gjPZ-YxNIIszEMwuxk2sVc0FZC4', 'stars365_bot');
            $res = $api->send('sendMessage', $data);
            Log::info($res);
        })->everyMinute();
    }
}
