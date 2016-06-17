<?php
/**
 * Created by PhpStorm.
 * User: bernt
 * Date: 16.06.2016
 * Time: 15.38
 */

namespace Anker\SmsMessenger;


class DummyMessenger implements SmsMessenger
{

    public function send($message, $receiver)
    {
        dump('Sending sms to ' . $receiver);
    }
}