<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

    require('./inc/php/Twilio.php');
    
    $response = new Services_Twilio_Twiml;
    $body = $_REQUEST['Body'];

    if( $body == 'hello' ){
        $response->message('Hi!');
    }else if( $body == 'bye' ){
        $response->message('Goodbye');
    }
    print $response;
?>
<!-- <Response>
	<Message>Hello, Mobile Monkey</Message>
</Response> -->
