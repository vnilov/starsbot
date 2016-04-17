<?php

namespace App\Http\Controllers\Livejournal;

use \App\Livejournal\Livejournal;
use \App\Stars365Bot\Stars365Bot;

class LivejournalController extends \App\Http\Controllers\Controller
{
    public function testTags() 
    {
        //$res = Stars365Bot::handleMessage('/last5');
        Stars365Bot::setTimestamp();
        Stars365Bot::getTimestamp();
    }
}