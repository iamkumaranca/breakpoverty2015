<?php
require_once('./connect_db.php');
session_start();

$username = $_POST["username"];
$password = hash('sha512', $_POST["password"]);

$stmt = $dbh->prepare('SELECT * FROM `user`;');
$stmt->execute();

foreach ($stmt->fetch() as $results)
{
   echo $results["username"];
}

// while($row = $stmt->fetch()) {
//     // if( $row['username'] == $username && $row['password'] == $password ) :
//     //     $_SESSION["logged-in"] = true;
//     //     header("Location: http://kumaransathianathan.ca/breakpoverty2015/index.php");
//     //     die();
//     // endif;
//     // if ($user_count == 0) :
//     //     header("Location: http://kumaransathianathan.ca/breakpoverty2015/login.php?error=Incorrect username or password!");
//     //     die();
//     // endif;
// }
?>
