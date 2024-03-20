<?php
include 'connection.php';

$username = 'gebruikersnaam';

$stmt = $conn->prepare(
    "SELECT gebruikersnaam, wachtwoord FROM users WHERE gebruikersnaam='$username'");
$stmt->execute();

$result = $stmt->fetch();

if(isset($result)){
    echo 'Klopt!';
}
else{
    echo 'Klopt Niet!';
}