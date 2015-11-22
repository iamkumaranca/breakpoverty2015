<?php
require_once('./connect_db.php');
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

	$stmt = $dbh->prepare('SELECT `id`, `username`, `password` FROM `user`;');
	$stmt->execute();

	echo $email;
	echo $password;

	while($row = $stmt->fetch()) {
		print_r($row)."<br/>"; // recursively print out object.
		if($email == $row['email']){
			echo("WELCOME TO OUR HIDDEN PAGE!!! You are now loggged in!");
			$_SESSION["logged-in"] = true;
		}else{
			echo("Access Denied");
		}
	}




?>
