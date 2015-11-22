<?php
require_once('./connect_db.php');
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

echo hash("sha512", '<br/eak>');

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
