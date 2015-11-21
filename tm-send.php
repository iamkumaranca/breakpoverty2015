<?php
require('./inc/php/tm/TextMagicAPI.php');

$api = new TextMagicAPI(array(
    "username" => "krizanthonymayo",
    "password" => "RK333eGOM2",
));

$text = "Hello world!";
$phones = array(6476695304);
$is_unicode = true;

$api->send($text, $phones, $is_unicode);
?>
