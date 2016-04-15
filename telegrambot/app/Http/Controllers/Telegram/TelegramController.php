<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Jobs\HandleMessage;
use Illuminate\Http\Request;

use App\Telegram\TelegramAPI;
use Log;

class TelegramController extends Controller
{
    public function getUpdates(Request $request)
    {
        $input = $request->all();
        //Log::info($input);
        $this->dispatch(new HandleMessage($input, $bot));
    }
}
