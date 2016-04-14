<?php


namespace App\Telegram;


/**
 * Interface TelegramDB
 *
 * @package App\Telegram
 */
interface TelegramDB
{
    /**
     * @param array $chat_data
     *
     * @return mixed
     */
    public function addChat(array $chat_data);

    /**
     * @param $chat_id
     *
     * @return mixed
     */
    public function getChat($chat_id);

    /**
     * @return mixed
     */
    public function getAllChats();

    /**
     * @param $chat_id
     *
     * @return mixed
     */
    public function removeChat($chat_id);

    /**
     * @param array $user_data
     *
     * @return mixed
     */
    public function addUser(array $user_data);

    /**
     * @param $user_id
     *
     * @return mixed
     */
    public function getUser($user_id);

    /**
     * @return mixed
     */
    public function getAllUsers();

    /**
     * @param $user_id
     *
     * @return mixed
     */
    public function removeUser($user_id);

    /**
     * @param array $message_data
     *
     * @return mixed
     */
    public function addMessage(array $message_data);

    /**
     * @param $message_id
     *
     * @return mixed
     */
    public function getMessage($message_id);

    /**
     * @return mixed
     */
    public function getAllMessages();

    /**
     * @param $message_id
     *
     * @return mixed
     */
    public function removeMessage($message_id);

    /**
     * @return mixed
     */
    public function removeAllMessages();
    
}