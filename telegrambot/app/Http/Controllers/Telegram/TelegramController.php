<?php

namespace App\Http\Controllers\Telegram;

use App\Telegram\TelegramAPI;

class TelegramController extends BaseController
{
    public function getUpdates()
    {
        $input = file_get_contents('php://input');
        var_dump($input);
    }
}
