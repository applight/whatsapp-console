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
require_once '../vendor/autoload.php';
use Twilio\Rest\Client;

$twilio = new Client(getenv('TWILIO_ACCOUNT_SID'),getenv('TWILIO_AUTH_TOKEN'));

$messages = $twilio->messages->read([], 50);

foreach ($messages as $msq) {
    echo "<div class=\"customer\" ><ul>";

    $msg = $twilio->messages->read([ "from" => $from ], 20);
    foreach($messages_from as $message_from) {
        echo "<li>" . $message_from->body . "</li>";
    }
        
    echo "</ul></div>";
}
?>
</div></body></html>
