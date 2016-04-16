<?php


namespace App\Telegram;


class TelegramAPI
{

    protected $version;
    protected $api_key;
    protected $name;

    /**
     * TelegramAPI constructor.
     */
    function __construct($api_key, $name)
    {
        if (empty($api_key)) {
            throw new TelegramException("no api_key");
        }

        if (empty($name)) {
            throw new TelegramException("no bot name");
        }

        $this->api_key = $api_key;
        $this->name    = $name;
    }
    
    public function send($action, $data)
    {
        $ch = curl_init();
        if ($ch === false) {
            throw new TelegramException('Curl failed to initialize');
        }

        $curlConfig = [
            CURLOPT_URL            => 'https://api.telegram.org/bot' . $this->getApiKey() . '/' . $action,
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SAFE_UPLOAD    => true,
        ];

        if (!empty($data)) {
            $curlConfig[CURLOPT_POSTFIELDS] = $data;
        }

        curl_setopt_array($ch, $curlConfig);
        $result = curl_exec($ch);

        curl_close($ch);
        return $result;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function getUpdates(array $data)
    {
        return $this->send('getUpdates', $data);
    }

    public function setWebhook($url = '', $file = null)
    {
        $data = ['url' => $url];
        if (!is_null($file)) {
            $data['certificate'] = $this->encodeFile($file);
        }
        return $this->send('setWebhook', $data);
    }

    public function sendMessage($chat_id, $text, $parse_mode = '', $disable_web_page_preview = false, $disable_notification = false, $reply_to_message_id = 0, $reply_markup = '') {
        if (intval($chat_id) <=0 || strlen($text) <= 0) {
            throw new TelegramException('chat_id and text params are required');
        } else {
            $data['chat_id'] = $chat_id;
            $data['text']    = $text;
        }
        $data['parse_mode']               = (string)$parse_mode;
        $data['disable_web_page_preview'] = ($disable_web_page_preview) ? (boolean)$disable_web_page_preview : false;
        $data['disable_notification']     = ($disable_notification) ? (boolean)$disable_notification : false;
        $data['reply_to_message_id']      = (integer)$reply_to_message_id;
        $data['reply_markup']             = $reply_markup;
        
        return $this->send('sendMessage', $data);
    }
    
    protected static function encodeFile($file)
    {
        $q = new \CURLFile($file);var_dump($q);
        return new \CURLFile($file);
    }
}