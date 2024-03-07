<?php
include 'connection.php';

$username = "username";
$password = "password";

$stmt = $conn->prepare(
    "SELECT gebruikersnaam, wachtwoord FROM users WHERE gebruikersnaam='$username' AND '$password'");
$stmt->execute();

$result = $stmt->fetch();

if(isset($result)){
    echo '<br>Klopt!';
}
else{
    echo 'Klopt Niet!';
}