<?php
/**
 * Date: 11.04.16
 * Time: 15:45
 */

namespace App\Telegram;


class TelegramDBMySQL implements TelegramDB
{

    /**
     * @param array $chat_data
     *
     * @return mixed
     */
    public function addChat(array $chat_data)
    {
        // TODO: Implement addChat() method.
        
    }

    /**
     * @param $chat_id
     *
     * @return mixed
     */
    public function getChat($chat_id)
    {
        // TODO: Implement getChat() method.
    }

    /**
     * @return mixed
     */
    public function getAllChats()
    {
        // TODO: Implement getAllChats() method.
    }

    /**
     * @param $chat_id
     *
     * @return mixed
     */
    public function removeChat($chat_id)
    {
        // TODO: Implement removeChat() method.
    }

    /**
     * @param array $user_data
     *
     * @return mixed
     */
    public function addUser(array $user_data)
    {
        // TODO: Implement addUser() method.
    }

    /**
     * @param $user_id
     *
     * @return mixed
     */
    public function getUser($user_id)
    {
        // TODO: Implement getUser() method.
    }

    /**
     * @return mixed
     */
    public function getAllUsers()
    {
        // TODO: Implement getAllUsers() method.
    }

    /**
     * @param $user_id
     *
     * @return mixed
     */
    public function removeUser($user_id)
    {
        // TODO: Implement removeUser() method.
    }

    /**
     * @param array $message_data
     *
     * @return mixed
     */
    public function addMessage(array $message_data)
    {
        // TODO: Implement addMessage() method.
    }

    /**
     * @param $message_id
     *
     * @return mixed
     */
    public function getMessage($message_id)
    {
        // TODO: Implement getMessage() method.
    }

    /**
     * @return mixed
     */
    public function getAllMessages()
    {
        // TODO: Implement getAllMessages() method.
    }

    /**
     * @param $message_id
     *
     * @return mixed
     */
    public function removeMessage($message_id)
    {
        // TODO: Implement removeMessage() method.
    }

    /**
     * @return mixed
     */
    public function removeAllMessages()
    {
        // TODO: Implement removeAllMessages() method.
    }
}