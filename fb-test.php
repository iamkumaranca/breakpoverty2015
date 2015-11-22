<?php
require ('./inc/php/firebaseLib.php');

const DEFAULT_URL = 'https://breakingpoverty2015.firebaseio.com/';
const DEFAULT_TOKEN = '98qyOIK3yGRdGfwICYqfMooqf74gwFYGaxMrGUGh';

$firebase = new Firebase(DEFAULT_URL, DEFAULT_TOKEN);
$firebase->set(DEFAULT_PATH . '/name/contact001', "John Doe");
$name = $firebase->get(DEFAULT_PATH . '/name/contact001');
?>
