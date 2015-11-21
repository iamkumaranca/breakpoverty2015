<?php
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$body = $_REQUEST['Body'];
$output = translate_string('hello');
?>
<Response>
	<Message><? echo $body; ?> RESEND <? echo $output; ?></Message>
</Response>

<?php

    function translate_string($input) {
        echo '<html class="no-js" lang="en-ca">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="x-ua-compatible" content="ie=edge">
                <title></title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
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
                    url: \'https://www.googleapis.com/language/translate/v2/detect?q=' . $input . '&key=AIzaSyChfy5ao_OoY9962aJOou2nA2OF5YNAEM8\',
                    dataType: \'json\',
                    type: \'GET\',
                    success: function(data) {
                        //console.log(data.data.detections[0][0].language);
                        console.log(data);
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
                            url: \'https://www.googleapis.com/language/translate/v2?key=AIzaSyChfy5ao_OoY9962aJOou2nA2OF5YNAEM8&q=' . $input . '&source=en&target=sw\',
                            dataType: \'json\',
                            type: \'GET\',
                            success: function(data) {
                                send_translation(data);
                            },
                            error: function(data){
                                console.log(data);
                            }
                        });
                    } else {
                        $.ajax({
                            url: \'https://www.googleapis.com/language/translate/v2?q=' . $input . '&target=en&key=AIzaSyChfy5ao_OoY9962aJOou2nA2OF5YNAEM8\',
                            dataType: \'json\',
                            type: \'GET\',
                            success: function(data) {
                                send_translation(data);
                            },
                            error: function(data){
                                console.log(data);
                            }
                        });
                    }
                }

                function send_translation(translated_word) {
                    var $translation = translated_word.data.translation[0][0].translatedText;
                }
                </script>
            </body>
        </html>';

        return 'hello';
    }

?>
