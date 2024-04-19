<?php
include 'connection.php';
$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord = $_POST['wachtwoord'];

$sql = "
INSERT INTO users (gebruikersnaam, wachtwoord)
  VALUES ('$gebruikersnaam', '$wachtwoord')";

$conn->exec($sql);
header('Location: login-pagina.php');