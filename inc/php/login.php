<?php
require_once('./connect_db.php');
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

$stmt = $dbh->prepare('SELECT `id`, `username`, `password` FROM `user`;');
$stmt->execute();

while($row = $stmt->fetch()) {
	// print_r($row)."<br/>"; // recursively print out object.
    echo $row['username'] . ' ' . $username . '<br />';
    echo $row['password']. ' ' . $password . '<br />';

    if( $row['username'] == $username && password_verify($password, $password['password'])) {
        echo 'Access Granted';
    } else {
        echo 'Access Denied';
    }



	// if($username == $row['username'] && $password = $row['password']) {
	// 	echo("WELCOME TO OUR HIDDEN PAGE!!! You are now loggged in!");
	// 	//$_SESSION["logged-in"] = true;
	// } else {
	// 	echo("Access Denied");
	// }
}
?>
