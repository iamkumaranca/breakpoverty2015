<?php
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
require ('./inc/php/translator.class.php');
$body = $_REQUEST['Body'];
$translation = new Traslator_API( $body );

?>
<Response>
	<Message><? echo $translation->getOutput(); ?> RESEND</Message>
</Response>
