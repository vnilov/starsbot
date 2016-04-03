<?php


namespace App\Livejournal;


use \PhpXmlRpc\Value;
use \PhpXmlRpc\Request;
use \PhpXmlRpc\Client;

class Livejournal
{

    protected $username;
    protected $password;
    protected $usejournal;

    /**
     * Livejournal constructor.
     */
    public function __construct($username, $password)
    {
        if (empty($username)) {
            throw new LivejournalException('no username');
        }

        if (empty($password)) {
            throw new LivejournalException('no password');
        }
        $this->username = new \PhpXmlRpc\Value($username, "string");
        $this->password = new \PhpXmlRpc\Value($password, "string");
    }

    public function getUserTags()
    {
        if (!empty($this->usejournal) > 0)
            $data['usejournal'] = $this->usejournal;
        return $this->sendRequest('getusertags', $data);
    }

    /**
     * @param mixed $usejournal
     */
    public function setUsejournal($usejournal)
    {
        $this->usejournal = new \PhpXmlRpc\Value($usejournal, "string");
    }


    private function sendRequest($action, $data = array())
    {

        $data['username'] = $this->username;
        $data['password'] = $this->password;

        $structure = array(
            new \PhpXmlRpc\Value($data, "struct")
        );

        $m = new \PhpXmlRpc\Request('LJ.XMLRPC.'.$action, $structure);

        $client = new \PhpXmlRpc\Client("/interface/xmlrpc", "www.livejournal.com", 80);
        $client->request_charset_encoding = "UTF-8";

        $res = $client->send($m);

        if (!$res->faultCode()) {
            $enc = new \PhpXmlRpc\Encoder;
            $result = $enc->decode($res->value());
        } else {
            throw new LivejournalException($res->faultString());
        }

        return $result;
    }
}