<?php
require ('./inc/php/firebaseLib.php');

const DEFAULT_URL = 'https://breakingpoverty2015.firebaseio.com/';
const DEFAULT_TOKEN = '98qyOIK3yGRdGfwICYqfMooqf74gwFYGaxMrGUGh';
const DEFAULT_PATH = '/firebase/example';

$firebase = new \FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);

// --- storing an array ---
$test = array(
    "foo" => "bar",
    "i_love" => "lamp",
    "id" => 42
);
$dateTime = new DateTime();
$firebase->set(DEFAULT_PATH . '/' . $dateTime->format('c'), $test);

// --- storing a string ---
$firebase->set(DEFAULT_PATH . '/name/contact001', "John Doe");

// --- reading the stored string ---
$name = $firebase->get(DEFAULT_PATH . '/name/contact001');
?>
