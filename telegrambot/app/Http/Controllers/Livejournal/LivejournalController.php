<?php

namespace App\Http\Controllers\Livejournal;

use \App\Livejournal\Livejournal;
use \App\Stars365Bot\Stars365Bot;

class LivejournalController extends \App\Http\Controllers\Controller
{
    public function testTags() 
    {
        $last = Stars365Bot::getInstance()->getPosts();

        $id = intval(Stars365Bot::getTimestamp());

        if ($id < $last['events'][0]['itemid'])
            Stars365Bot::setTimestamp($id);
    }
}