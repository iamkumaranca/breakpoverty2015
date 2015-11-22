<?php
require_once('./connect_db.php');
session_start();

$username = $_POST["username"];
$password = hash('sha512', $_POST["password"]);

$stmt = $dbh->prepare('SELECT `username`, `password` FROM `user`;');
$stmt->execute();

$user_count = end($stmt);

while($row = $stmt->fetch()) {
    if( $row['username'] == $username && $row['password'] == $password ) :
        $_SESSION["logged-in"] = true;
        header("Location: http://kumaransathianathan.ca/breakpoverty2015/index.php");
        die();
    endif;
    echo $user_count;
    $user_count--;
    echo '<br />';
    echo $user_count;
    // if ($user_count == 0) :
    //     header("Location: http://kumaransathianathan.ca/breakpoverty2015/login.php?error=Incorrect username or password!");
    //     die();
    // endif;
}
?>
