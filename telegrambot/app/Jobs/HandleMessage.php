<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\TBot;
use App\Models\TChat;
use App\Models\TGroup;
use App\Models\TUser;

use Log;

use App\Stars365Bot\Stars365Bot;

/**
 * Class HandleMessage
 *
 * @package App\Jobs
 */
class HandleMessage extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    
    protected $request;
    protected $bot;


    /**
     * HandleMessage constructor.
     *
     * @param array $request
     */
    public function __construct(TBot $bot, array $request)
    {
        $this->request = $request;
        $this->bot     = $bot;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // save data to DB
        // firstly, save chat

        
        
        $chat = TChat::firstOrCreate([
            'bot_id'      => $this->bot->id,
            'type'        => $this->request['message']['chat']['type'],
            'telegram_id' => $this->request['message']['chat']['id']
        ]);
        Log::info($this->bot);
        Log::info($chat);
            die();
        // save message using relation on models
        $message = $chat->messages()->create([
            'telegram_id' => $this->request['message']['message_id'],
            'text'        => $this->request['message']['text']
        ]);
        
        // save user or group
        if ($chat->telegram_id > 0) {
            $user = TUser::firstOrNew(['telegram_id' => $chat->telegram_id]);
            $user->user_name = $this->request['message']['from']['username'];
            $user->first_name = $this->request['message']['from']['first_name'];
            $user->second_name = $this->request['message']['from']['last_name'];
            $user->save();
        } elseif ($chat->telegram_id < 0) {
            $group = TGroup::firstOrNew(['telegram_id' => $chat->telegram_id]);
            $group->title = $this->request['message']['chat']['title'];
            $group->save();
        }

        Stars365Bot::handleMessage($this->request);
        
    }
}
