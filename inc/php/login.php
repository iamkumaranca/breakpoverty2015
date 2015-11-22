<?php
require_once('./connect_db.php');
session_start();

$username = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$stmt = $dbh->prepare('SELECT `id`, `username`, `password` FROM `user`;');
$stmt->execute();

while($row = $stmt->fetch()) {
	print_r($row)."<br/>"; // recursively print out object.
    echo $row['username']."<br/>";
    echo $row['password']."<br />";
	// if($username == $row['username'] && $password = $row['password']) {
	// 	echo("WELCOME TO OUR HIDDEN PAGE!!! You are now loggged in!");
	// 	//$_SESSION["logged-in"] = true;
	// } else {
	// 	echo("Access Denied");
	// }
}
?>
