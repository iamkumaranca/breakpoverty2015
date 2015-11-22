<?php

require ('./inc/php/translator.class.php');
//$body = $_REQUEST['Body'];
$translation = new Traslator_API( "hallo" );
?>
<Response>
	<Message><? echo $translation->getOutput(); ?></Message>
</Response>
