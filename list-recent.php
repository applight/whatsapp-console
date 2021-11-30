<?php
// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

class Set {
    public $set = array();
    
    public function add($elem) {
        if (!in_array($elem, $this->set)) {
            $this->set = array_push($this->set, $elem);
        }
        return $this->set;
    }
    
    public function contains($elem) {
        return in_array($this->set, $elem);
    }
}


// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = getenv("TWILIO_ACCOUNT_SID");
$token = getenv("TWILIO_AUTH_TOKEN");
$twilio = new Client($sid, $token);

$messages = $twilio->messages
                   ->read([], 50);
$froms = new Set;
foreach ($messages as $record) {
    $froms->add($record->from);
}

?>
<html>
<head></head>
<body>
<?php
foreach ($froms as $from) {
    echo "<div class=\"customer\" ><ul>";

    $messages_from = $twilio->messages->read([ "from" => $from ], 20);
    foreach($messages_from as $message_from) {
        echo "<li>" . $message_from->body . "</li>";
    }
        
    echo "</ul></div>";
}
?>
</body>
</html>
