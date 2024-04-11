<?php
session_start();
include 'connection.php';

$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord = $_POST['wachtwoord'];

$stmt = $conn->prepare("SELECT * FROM users WHERE gebruikersnaam = :gebruikersnaam AND wachtwoord = :wachtwoord");
$stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
$stmt->bindParam(':wachtwoord', $wachtwoord);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user) {
    $_SESSION['gebruikersnaam'] = $gebruikersnaam;
    $_SESSION['rol'] = $user['rol'];

    if ($user['rol'] == 'admin') {
        header('Location: admin-pagina.php');
        exit();
    } else if ($user['rol'] == 'rgb') {
        header('Location: rgb.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
} else {
    $_SESSION['error'] = "Ongeldige inloggegevens!";
    header('Location: login-pagina.php');
    exit();
}
