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
$messages = $twilio->messages->read([], 50);

echo "<div class=\"customer\" >";
foreach ($messages as $message) {
    echo "<ul class=\"sms-list\">";
        
    $msgs = $twilio->messages->read([ "from" => $from ], 20);
    foreach($msgs as $message_from) {
        echo "<li>" . $message_from->body . "</li>";
    }
    echo "</ul>";
}
echo "</div>";
?>
</div></body></html>
