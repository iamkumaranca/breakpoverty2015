<?php
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

include_once('./inc/php/connect_db.php');
require ('./inc/php/translator.class.php');

$stmt = $dbh->prepare("INSERT INTO sms (id, sent_from, sent_to, message) VALUES ('', :sent_from, :sent_to, :message)");
$stmt->bindParam(':sent_from', $sent_from);
$stmt->bindParam(':sent_to', $sent_to);
$stmt->bindParam(':message', $body);

$body = $_REQUEST['Body'];
$sent_from = $_REQUEST['From'];
$sent_to = $_REQUEST['To'];
$stmt->execute();
$translation = new Traslator_API( rawurlencode(strtolower($status)) );
?>
<Response>
	<Message><? echo $translation->translateInput(); ?></Message>
</Response>
