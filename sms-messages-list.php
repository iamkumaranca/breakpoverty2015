<?php
// Get the PHP helper library from twilio.com/docs/php/install
require('./inc/php/Twilio.php'); // Loads the library

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "ACa05f6964ee72c4484248d314229a6cc7";
$token = "00e53c85bd5e7108ee44b580274fc4cc";
$client = new Services_Twilio($sid, $token);

// Loop over the list of smss and echo a property for each one
foreach ($client->account->incomingphonenumbers as $sms) {
    echo $sms->phonenumber . '<br /><br />';
    //echo $sms->body . '<br /><br />';
}

?>
