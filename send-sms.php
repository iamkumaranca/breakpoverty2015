<?php

require_once('./inc/php/Twilio.php');

// set your AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "ACa05f6964ee72c4484248d314229a6cc7";
$AuthToken = "00e53c85bd5e7108ee44b580274fc4cc";

$client = new Services_Twilio($AccountSid, $AuthToken);

$message = $client->account->messages->create(array(
    "From" => "647-691-0478",
    "To" => "647-677-2556",
    "Body" => "Test message!",
));

// Display a confirmation message on the screen
echo "Sent message {$message->sid}";
?>
