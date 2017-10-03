<?php

require_once ('vendor/autoload.php');


$credentials = new Nexmo\Client\Credentials\Basic('f2fdda8f', '481b6454e78de3ee');
$client = new Nexmo\Client($credentials);

$message = $client->message()->send([
    'from' => '5591998296476',
    'to' => '5591984695742',
    'text' => 'Oi :)'
]);








