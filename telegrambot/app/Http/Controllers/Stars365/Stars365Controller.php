<?php

namespace App\Http\Controllers\Stars365;

use App\Http\Controllers\Controller;
use App\Jobs\HandleMessage;
use Illuminate\Http\Request;

use App\Models\TBot;
use App\Telegram\TelegramAPI;
use Log;

class Stars365Controller extends Controller
{
    public function getUpdates(Request $request)
    {
        
        $input = $request->all();
        $bot = TBot::where('name', 'stars365_bot')->get()->first();

        $this->dispatch(new HandleMessage($bot, $input));
    }
}