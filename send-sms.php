<?php

require "/path/to/twilio-php/Services/Twilio.php";

// set your AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$AuthToken = "YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY";

$client = new Services_Twilio($AccountSid, $AuthToken);

$message = $client->account->messages->create(array(
    "From" => "YYY-YYY-YYYY",
    "To" => "XXX-XXX-XXXX",
    "Body" => "Test message!",
));

// Display a confirmation message on the screen
echo "Sent message {$message->sid}";
