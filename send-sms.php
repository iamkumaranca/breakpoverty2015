<?php

require('./inc/php/Twilio.php');

// set your AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "ACa05f6964ee72c4484248d314229a6cc7";
$AuthToken = "00e53c85bd5e7108ee44b580274fc4cc";

$client = new Services_Twilio($AccountSid, $AuthToken);

// Step 4: make an array of people we know, to send them a message.
    // Feel free to change/add your own phone number and name here.
    $people = array(
        "+16476695304" => "Kriz",
        "+16476772556" => "Kumaran"
    );

    // Step 5: Loop over all our friends. $number is a phone number above, and
    // $name is the name next to it
    foreach ($people as $number => $name) {

        $sms = $client->account->messages->sendMessage(

        // Step 6: Change the 'From' number below to be a valid Twilio number
        // that you've purchased, or the (deprecated) Sandbox number
            "647-691-0478",

            // the number we are sending to - Any phone number
            $number,

            // the sms body
            "Hey $name, Monkey Party at 6PM. Bring Bananas!"
        );

        // Display a confirmation message on the screen
        echo "Sent message to $name";

    }
// Display a confirmation message on the screen
echo "Sent message {$message->sid}";
?>
