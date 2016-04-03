<?php

namespace App\Http\Controllers\Livejournal;

use \App\Livejournal\Livejournal;

class LivejournalController extends \App\Http\Controllers\Controller
{
    public function testTags() 
    {
        $stars = new Livejournal('junona', 'CTC2005trenirovka');
        $stars->setUsejournal('stars365');
        var_dump($stars->getUserTags());
    }
}