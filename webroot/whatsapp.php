<html>
<head>
<link rel="stylesheet" href="style.css">
</head><body>
<div id="page">
<div class="topnav">
<a class="active" href="#home">Home</a>
<a href="./whatsapp.php">WhatsApp Console</a>
</div>
<div class="chats">
<?php
	require_once '/var/www/vhosts/whatsapp.thenshow.me/httpdocs/vendor/autoload.php';
	use Twilio\Rest\Client;
	
	$twilio = new Client(getenv('TWILIO_ACCOUNT_SID'),getenv('TWILIO_AUTH_TOKEN'));

    $msgs = $twilio->messages->read([ 'to' => "whatsapp:+14155238886" ], 50);
	
	$client_numbers = array();
	foreach($msgs as $msg) {
		in_array($msg->from, $client_numbers) ? $client_numbers : array_push($client_numbers, $msg->from);
	}
	
	foreach($client_numbers as $from) {
		echo "<p>client number is: " . $from . "</p>";
		$thread = array_merge(
			$twilio->messages->read([ 'to' => "whatsapp:+14155238886", 'from' => $from ], 20 ),
			$twilio->messages->read([ 'to' => $from, 'from' => "whatsapp:+14155238886" ], 20 )
		);
		
		usort($thread, function($a, $b) { return $a->date_sent < $b->date_sent; });
		
		echo "<div class=\"thread\"><p>Conversation with "
			. $msg->to ." and "
			. $msg->from."</p><ul class=\"messages\">";
		
		foreach( $thread as $msg ) {
			echo "<li class=\"message\">"
                . $msg->date_sent->format("%H:%M:%S") ."| "
                . $msg->from ." says `"
                . $msg->body ."`</li>"; 
		}
		echo "</ul></div>";
	}
	echo "</div></body></html>";
?>
