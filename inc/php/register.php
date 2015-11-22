<?php
require_once('./connect_db.php');
session_start();

$username = $_POST["username"];
$password = hash('sha512', $_POST["password"]);
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$mobile_phone = $_POST["mobile_phone"];
$site_role = $_POST["site_role"];
$confirm_password = hash('sha512', $_POST["confirm_password"]);

if($password == $confirm_password) {
    $stmt = $dbh->prepare("INSERT INTO users VALUES ('', :username, :password, :first_name, :last_name, :email, :mobile_phone, :site_role)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mobile_phone', $mobile_phone);
    $stmt->bindParam(':site_role', $site_role);
    $stmt->execute();
} else {
    header("Location: http://kumaransathianathan.ca/breakpoverty2015/register.php?error=Password do not match!");
    die();
}
?>
