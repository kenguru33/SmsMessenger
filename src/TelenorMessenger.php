<?php

namespace Anker\SmsMessenger;

class TelenorMessenger implements SmsMessenger
{
    private $sender;
    private $password;
    private $sID;
    private $responseContentType;
    private $gateway;

    public function __construct()
    {
        $this->sender = config('sms.provider.telenor.sender');
        $this->password = config('sms.provider.telenor.password');
        $this->sID = config('sms.provider.telenor.sID');
        $this->responseContentType = config('sms.provider.telenor.responseContentType');
        $this->gateway = config('sms.provider.telenor.gateway');
    }

    public function send($message, $receiver)
    {
        //https://telenormobil.no/ums/smapi/input?sender=YOURPHONENUMBER&password=YOUR1999PASSWORD&recipients=YOURPHONENUMBER&sId=1000000000&content=Hello+World&responseContentType=text/plain

        $data = "sender=" . $this->sender . "&password=" . $this->password . "&recipients=" . $receiver . "&sId=" . $this->sID . "&content=" . $message . "&responseContentType=" . $this->responseContentType;

        $params = array('https' => array(
            'method' => 'POST',
            'header' => "Content-type: application/x-www-form-urlencoded\r\n" . "Content-Length: " . strlen($data) . "\r\n",
            'content' => $data
        ));

        $ctx = stream_context_create($params);
        $fp = @fopen($this->gateway, 'rb', false, $ctx);

    }
}