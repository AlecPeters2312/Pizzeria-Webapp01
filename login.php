<?php
include 'connection.php';
var_dump($_SESSION);
echo "<br>";
session_start();
echo session_id() . "<br>";
var_dump($_SESSION);
echo "<br>";
$_SESSION["gebruikersnaam"] = "Admin";
$_SESSION["wachtwoord"] = "P@ssw0rd";

// $username = 'gebruikersnaam';

// $stmt = $conn->prepare(
//     "SELECT gebruikersnaam, wachtwoord FROM users WHERE gebruikersnaam='$username'");
// $stmt->execute();

// $result = $stmt->fetch();

// if(isset($result)){
//     echo 'Klopt!';
// }
// else{
//     echo 'Klopt Niet!';
// }