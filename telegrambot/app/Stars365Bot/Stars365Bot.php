<?php


namespace App\Stars365Bot;


use App\Livejournal\Livejournal;
use App\Telegram\TelegramAPI;
use App\Models\TBot;
use App\Models\TChat;

use Log;

use Mockery\CountValidator\Exception;
use Storage;

class Stars365Bot
{
    
    private static $instance;
    /**
     * LiveJournal instance
     * */
    private $lj;

    /**
     * Telegram instance
     */
    private $tm;

    private $bot_id;
    /**
     * Returns the Stars365Bot instance of this class.
     *
     * @return Singleton The Stars365Bot instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }
    
    /**
     * Stars365Bot constructor.
     */
    public function __construct()
    {
        $this->lj = new Livejournal('junona', 'CTC2005trenirovka');
        $this->lj->setUsejournal('stars365');
        $this->lj->setVer();

        $bot = TBot::where('name', 'stars365_bot')->get()->first();
        if ($bot != null) {
            $this->tm = new TelegramAPI($bot->token, $bot->name);
            $this->bot_id = $bot->id;
        }
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * Stars365Bot instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the Stars365Bot
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
    
    
    public static function handleMessage($data) 
    {
        
        $message = $data['message']['text'];
        $i = static::getInstance();
        switch ($message) {
            case "/help":
                $text = "<b>/help</b> - помощь<b> \n/start</b> - активировать бота";
                $i->tm->sendMessage($data['message']['chat']['id'], $text);
                break;
            case "/start":
                break;
            case "/last":
                $p = $i->getPosts();
                $i->tm->sendMessage($data['message']['chat']['id'], $p['events'][0]['url']);
                break;
            case "/last5":
                $p = $i->getPosts(5);
                for ($j = 0; $j < 5; $j++) {
                    $i->tm->sendMessage($data['message']['chat']['id'], $p['events'][$j]['url']);
                }
                break;
            default:
                return $i->searchPosts();
                break;
        }
        
    }
    
    function getPosts($num = 1)
    {
        return $this->lj->getEvents('lastn', $num);
    }
    
    private function searchPosts() 
    {
        
    }
    
    static function getTags()
    {
        return static::getInstance()->lj->getUserTags();
    }

    static function getLastID()
    {
        return Storage::get('lastid');
    }

    static function setLastID($id = 0)
    {
        if ($id <= 0)
            throw new Exception('wrong id');

        Storage::put('lastid', $id);
    }

    static function checkNewPost()
    {
        $i = static::getInstance();
        $last = $i->getPosts();
        $id = intval(static::getLastID());

        if ($id < $last['events'][0]['itemid']) {
            static::setLastID($id);
            $chats = TChat::where('bot_id', static::getInstance()->bot_id)->get();
            foreach ($chats as $chat) {
                $i->tm->sendMessage($chat->telegram_id, $last['events'][0]['url']);
            }
        }
    }
}