<?php
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

include_once('./inc/php/connect_db.php');
require ('./inc/php/translator.class.php');

$body = $_REQUEST['Body'];
$sent_from = $_REQUEST['From'];
$sent_to = $_REQUEST['To'];

$translation = new Traslator_API( rawurlencode(strtolower($body)) );
$translated_string = $translation->translateInput();

if('' != $translated_string) :
    $stmt = $dbh->prepare("INSERT INTO sms (id, sent_from, sent_to, message, translated) VALUES ('', :sent_from, :sent_to, :message, :translated)");
    $stmt->bindParam(':sent_from', $sent_from);
    $stmt->bindParam(':sent_to', $sent_to);
    $stmt->bindParam(':message', $body);
    $stmt->bindParam(':translated', $translated_string);
    $stmt->execute();
endif;



?>
<Response>
	<Message><? echo $body . ' -> ' .  $translated_string ?></Message>
</Response>
