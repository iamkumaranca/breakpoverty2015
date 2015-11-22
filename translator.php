<?php
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

include_once('./inc/php/connect_db.php');
require ('./inc/php/translator.class.php');


$stmt = $dbh->prepare("INSERT INTO sms (id, date_sent, sent_from, sent_to, message, status, direction) VALUES ('', :date_sent, :sent_from, :sent_to, :message, :status, :direction)");
$stmt->bindParam(':date_sent', $date_sent);
$stmt->bindParam(':sent_from', $sent_from);
$stmt->bindParam(':sent_to', $sent_to);
$stmt->bindParam(':message', $body);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':direction', $direction);

$body = $_REQUEST['Body'];
$date_sent = $_REQUEST['Date_Sent'];
$old_date = date('D, d M Y H:i:s O');
$old_date_timestamp = strtotime($old_date);
$date_sent = date(YY-MM-DD hh:mm:ss);
$sent_from = $_REQUEST['From'];
$sent_to = $_REQUEST['To'];
$status = $_REQUEST['Status'];
$direction = $_REQUEST['Direction'];
$stmt->execute();
$translation = new Traslator_API( rawurlencode(strtolower($body)) );
?>
<Response>
	<Message><? echo $translation->translateInput() . ' ' . $date_sent; ?></Message>
</Response>
