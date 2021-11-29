<?php

// Required if your environment does not handle autoloading
require_once __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

$sid   = getenv('TWILIO_ACCOUNT_SID');
$token = getenv('TWILIO_AUTH_TOKEN');
$client = new Client($sid, $token);

$msg = $client->message->create(
	$_POST['From'],
	[ 'from' => $_POST['To'],
	  'body' => 'My name is cuban pete and my friend said ' + $_POST['Body']
	]);
echo $msg->sid;
?>