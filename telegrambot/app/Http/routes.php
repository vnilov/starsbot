<?php

use App\Telegram\TelegramAPI;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $data['text'] = 'test';
    $api = new TelegramAPI('212227548:AAE-5XX0gjPZ-YxNIIszEMwuxk2sVc0FZC4', 'stars365_bot');
    $res = $api->getUpdates(array());
    return $res;
});

Route::get('/test', 'Livejournal\LivejournalController@testTags');
