<?php

namespace App\Http\Controllers\Telegram;

use App\Telegram\TelegramAPI;
use Log;

class TelegramController extends \Controller
{
    public function getUpdates()
    {
        $input = file_get_contents('php://input');
        Log::info($input);
    }
}
