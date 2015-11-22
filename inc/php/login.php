<?php
require_once('./connect_db.php');
session_start();

$username = $_POST["username"];
$password = hash('sha512', $_POST["password"]);

$stmt = $dbh->prepare('SELECT `username`, `password` FROM `user`;');
$stmt->execute();

while($row = $stmt->fetch()) {
    if( $row['username'] == $username && $row['password'] == $password ) {
        $_SESSION["logged-in"] = true;
        header("Location: http://kumaransathianathan.ca/breakpoverty2015/index.php");
        die();
    } else {
        //header("Location: http://kumaransathianathan.ca/breakpoverty2015/login.php?error=Incorrect username or password!");
        //die();

        echo 'db: ' . $row['password'] . '<br />';
        echo 'user: ' . $password . '<br />';
        echo 'db: ' . $username . '<br />';
        echo 'user: ' . $row['username'] . '<br />';

    }
}
?>
