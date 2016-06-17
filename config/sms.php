<?php

return [
    
    'default-provider' => 'pswincom',
    
    'provider' => [
        "pswincom" => [
            'username' => 'user',
            'password' => 'secret',
            'gateway' => 'http://sms.pswin.com/http4sms2/send.aspx',
            'sender' => 'MyCompany',
            'receiver-prefix' => '47'
        ],
    
        "telenor" => [
            'sender' => 'username',
            'password' => 'secret',
            'sID' => '',
            'responseContentType' => 'text/plain',
            'gateway' => 'https://telenormobil.no/ums/smapi/input'
        ],

        "dummy" => []
    ]
];

