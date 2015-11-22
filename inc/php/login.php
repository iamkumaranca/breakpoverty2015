<?php
require_once('./connect_db.php');
session_start();

$username = $_POST["username"];
$password = hash('sha512', $_POST["password"]);

$stmt = $dbh->prepare('SELECT * FROM `user`;');
$stmt->execute();

$user_count = count($stmt->fetch());

echo '<pre>';
print_r($stmt->fetch());
echo '</pre>';

while($row = $stmt->fetch()) {
    // if( $row['username'] == $username && $row['password'] == $password ) :
    //     $_SESSION["logged-in"] = true;
    //     header("Location: http://kumaransathianathan.ca/breakpoverty2015/index.php");
    //     die();
    // endif;
    echo 'before: ' . $user_count;
    echo '<br />';
    echo $row['username'];
    $user_count--;
    echo '<br />';
    echo 'after: ' . $user_count;
    echo '<br />';
    // if ($user_count == 0) :
    //     header("Location: http://kumaransathianathan.ca/breakpoverty2015/login.php?error=Incorrect username or password!");
    //     die();
    // endif;
}
?>
