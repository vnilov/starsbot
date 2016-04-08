<?php


namespace App\Stars365Bot;


use App\Livejournal\Livejournal;

class Stars365Bot
{
    
    private static $instance;
    /**
     * LiveJournal instance
     * */
    private $lj;

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
    
    
    public static function handleMessage($message) {
        $i = static::getInstance();
        switch ($message) {
            case "/help":
                break;
            case "/start":
                break;
            case "/last":
                return $i->getPosts();
                break;
            case "/last5":
                break;
            default:
                break;
        }
        
    }
    
    private function getPosts($num = 1) {
        return $this->lj->getEvents('lastn', $num);
    }
    
}