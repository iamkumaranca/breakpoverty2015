<?php
require_once('./connect_db.php');
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

define("MAX_LENGTH", 6);

    $intermediateSalt = md5(uniqid(rand(), true));
    $salt = substr($intermediateSalt, 0, MAX_LENGTH);
    echo hash("sha256", '<br/eak>' . $salt);
    echo '<br/><br/> ' .  $salt;

$stmt = $dbh->prepare('SELECT `id`, `username`, `password` FROM `user`;');
$stmt->execute();

while($row = $stmt->fetch()) {
	// print_r($row)."<br/>"; // recursively print out object.
    echo $row['username'] . '<br />' . $username . '<br /><br />';
    echo $row['password']. '<br />' . $password . '<br /><br />';

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
