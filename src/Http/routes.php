<?php

Route::get('sms', 'Anker\SmsMessenger\Http\Controllers\SmsMessengerController@index');
Route::get('sms/send/{message}/{receiver}', 'Anker\SmsMessenger\Http\Controllers\SmsMessengerController@send');
Route::post('sms', 'Anker\SmsMessenger\Http\Controllers\SmsMessengerController@send');