<?php
session_start();
include 'connection.php';

$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord = $_POST['wachtwoord'];

$stmt = $conn->prepare("SELECT * FROM users WHERE gebruikersnaam = :gebruikersnaam AND wachtwoord = :wachtwoord");
$stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
$stmt->bindParam(':wachtwoord', $wachtwoord);
$stmt->execute();

$user = $stmt->fetch();
if ($user) {
    $_SESSION['gebruikersnaam'] = $gebruikersnaam;
    $_SESSION['rol'] = $user['rol'];

    if ($user['rol'] == 'admin') {
        header('Location: admin-pagina.php');
    } else if ($user['rol'] == 'rgb') {
        header('Location: rgb.php');
    } else {
        header('Location: index.php');
    }
} else {
    $_SESSION['error'] = "Ongeldige inloggegevens!";
    header('Location: login-pagina.php');
}

