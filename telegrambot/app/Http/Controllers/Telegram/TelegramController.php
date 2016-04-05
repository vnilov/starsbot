<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Telegram\TelegramAPI;
use Log;

class TelegramController extends Controller
{
    public function getUpdates(Request $request)
    {
        //$input = file_get_contents('php://input');
        $input = $request->all();
        Log::info($input);
    }
}
