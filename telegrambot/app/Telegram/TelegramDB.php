<?php


namespace App\Telegram;


interface TelegramDB
{
    public function saveChat($chat_id);

    public function hasChat($chat_id);

    public function getAllChats();

    public function saveUpdate($update_name);

    public function getUpdate();
}