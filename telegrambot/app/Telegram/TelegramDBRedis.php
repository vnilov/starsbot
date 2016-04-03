<?php


namespace App\Telegram;


class TelegramDBRedis implements TelegramDB
{
    protected $chats_key = 'telegram:chats';

    protected $update_key = 'telegram:updates';

    public function __construct()
    {

    }

    public function hasChat($chat_id)
    {
        if (empty($chat_id))
            throw new TelegramDBException('no chat id');

        return \Redis::sismembers($this->chats_key . " " . $chat_id);
    }

    public function getAllChats()
    {
        return \Redis::smembers($this->chats_key);
    }

    public function saveChat($chat_id)
    {
        if (empty($chat_id))
            throw new TelegramDBException('no chat id');

        return \Redis::sadd($this->chats_key . " " . $chat_id);
    }

    public function getUpdate()
    {
        return \Redis::rpop($this->update_key);
    }

    public function saveUpdate($update_name)
    {
        if (empty($update_name))
            throw new TelegramDBException("no update name");

        return \Redis::rpush($this->update_key . " " . $update_name);
    }
}