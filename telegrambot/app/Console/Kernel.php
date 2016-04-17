<?php

namespace App\Console;

use Log;
use App\Stars365Bot\Stars365Bot;
use App\Models\TChat;
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
            
            $last = Stars365Bot::getInstance()->getPosts();
            $id = intval(Stars365Bot::getTimestamp());

            if ($id < $last['events'][0]['itemid']) {
                Stars365Bot::setTimestamp($id);
                $chats = TChat::all();
                $data['message']['text'] = "/last";
                foreach ($chats as $chat) {
                    $data['message']['chat']['id'] = $chat->telegram_id;
                    Stars365Bot::handleMessage($data);
                }
            }

        })->everyFiveMinutes();
    }
}
