<?php
require_once('./connect_db.php');
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

while($row = $stmt->fetch()) {
    if( $row['username'] == $username && hash('sha512', $password)) {
        $_SESSION["logged-in"] = true;
        header("Location: http://kumaransathianathan.ca/breakpoverty2015/index.php");
        die();
    } else {
        header("Location: http://kumaransathianathan.ca/breakpoverty2015/login.php?error=Incorrect username or password!");
        die();
    }
}
?>
