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

    public function getUpdates(array $data) {
        return self::send('getUpdates', $data);
    }
}