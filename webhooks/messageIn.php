<?php
// Required if your environment does not handle autoloading
// require_once '../../vendor/autoload.php';
// Use the REST API Client to make requests to the Twilio REST API
// use Twilio\Rest\Client;

echo "before anything but autoload";

$sid   = getenv('TWILIO_ACCOUNT_SID');
$token = getenv('TWILIO_AUTH_TOKEN');
echo "sid: " . $sid;

$client = new Twilio\Rest\Client($sid, $token);

$msg = $client->message->create(
	$_POST['From'],
	[ 'from' => $_POST['To'],
	  'body' => 'My name is cuban pete and my friend said ' . $_POST['Body']
	]);
	
echo $msg->sid;


?>
