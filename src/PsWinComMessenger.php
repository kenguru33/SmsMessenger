<?php
/**
 * Created by PhpStorm.
 * User: bernt
 * Date: 16.06.2016
 * Time: 12.12
 */

namespace Anker\SmsMessenger;


use Exception;
use Illuminate\Support\Facades\Config;

class PsWinComMessenger implements SmsMessenger
{
    private $username;
    private $password;
    private $gateway;
    private $sender;
    private $prefix;

    public function __construct()
    {
        $this->username = config('sms.provider.pswincom.username');
        $this->password = config('sms.provider.pswincom.password');
        $this->gateway = config('sms.provider.pswincom.gateway');
        $this->sender = config('sms.provider.pswincom.sender');
        $this->prefix = config('sms.provider.pswincom.receiver-prefix');
    }

    public function send($message, $receiver)
    {
        $data = "USER=" . $this->username . "&PW=" . $this->password . "&SD=" . $this->sender . "&RCV=" . $this->prefix . $receiver . "&TXT=" . $message;

        $params = array('http' => array(
            'method' => 'POST',
            'header' => "Content-type: application/x-www-form-urlencoded\r\n" . "Content-Length: " . strlen($data) . "\r\n",
            'content' => $data
        ));

        $ctx = stream_context_create($params);
        $fp = @fopen($this->gateway, 'rb', false, $ctx);

        $php_errormsg = $fp;

        if (!$fp)
            throw new Exception("Problem with $this->gateway, $php_errormsg");
        $response = @stream_get_contents($fp);

        if ($response === false)
            throw new Exception("Problem reading data from $this->gateway, $php_errormsg");
        echo $response;
    }
}