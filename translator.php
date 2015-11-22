<?php


require ('./inc/php/translator.class.php');
$body = $_REQUEST['Body'];
//$translation = new Traslator_API( rawurlencode(strtolower($body)) );
$translation = new Traslator_API( 'hello' );
?>
<Response>
	<Message><? echo $translation->translateInput(); ?></Message>
</Response>
