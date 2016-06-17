<?php
/**
 * Created by PhpStorm.
 * User: bernt
 * Date: 16.06.2016
 * Time: 12.06
 */

namespace Anker\SmsMessenger;


interface SmsMessenger
{
    public function send($message, $receiver);
}