<?php
namespace Anker\SmsMessenger\Http\Controllers;

use Anker\SmsMessenger\SmsMessenger;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SmsMessengerController extends Controller
{

    public function index(SmsMessenger $smsMessenger)
    {
        return view('sms::send-sms');
    }
    
    public function send(SmsMessenger $smsMessenger, Request $request)
    {
        $smsMessenger->send($request->get('message'), $request->get('receiver'));
    }
    
}