<?php
// Get the PHP helper library from twilio.com/docs/php/install
require('./inc/php/Twilio.php'); // Loads the library

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "ACa05f6964ee72c4484248d314229a6cc7";
$token = "00e53c85bd5e7108ee44b580274fc4cc";
$client = new Services_Twilio($sid, $token);

//Loop over the list of smss and echo a property for each one
// foreach ($client->account->sms_messages as $sms) {
//     echo $sms->from . ' ' . $sms->date_sent . '<br />';
//     echo $sms->body . '<br /><br />';
// }

$numItems = count($client->account->sms_message);
$i = 0;
foreach ($client->account->sms_messages as $sms) {
    echo $i;
    $i++;
  if($i === $numItems) {
      echo $sms->from . ' ' . $sms->date_sent . '<br />';
      echo $sms->body . '<br /><br />';
  }
}

?>



<!doctype html>
<html class="no-js" lang="en-ca">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="./inc/js/jquery-2.1.4.min.js"><\/script>')</script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <h1>Welcome to the SMS Translator</h1>

        <div id="sourceText">Hello world, we are testing SMS Translation!</div>
        <div id="translation"></div>

        <script>
        $.ajax({
            url: 'https://www.googleapis.com/language/translate/v2/detect?q=hello&key=AIzaSyChfy5ao_OoY9962aJOou2nA2OF5YNAEM8',
            dataType: 'json',
            type: 'GET',
            success: function(data) {
                //console.log(data.data.detections[0][0].language);
                console.log('detect success');
                translate_string(data);
            },
            error: function(data){
                console.log(data);
            }
        });

        function translate_string(detected_language) {
            var language = detected_language.data.detections[0][0].language;

            if ("en" == language) {
                $.ajax({
                    url: 'https://www.googleapis.com/language/translate/v2?key=AIzaSyChfy5ao_OoY9962aJOou2nA2OF5YNAEM8&source=en&target=sw&q=hello%20world',
                    dataType: 'json',
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            } else {
                $.ajax({
                    url: 'https://www.googleapis.com/language/translate/v2?q=hello&target=de&key=AIzaSyChfy5ao_OoY9962aJOou2nA2OF5YNAEM8',
                    dataType: 'json',
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            }
        }
        </script>
    </body>
</html>
