<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $newrol = $_POST['newrol'];

    $sql = "UPDATE users SET rol=:newrol WHERE gebruikersnaam = :gebruikersnaam;";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':newrol', $newrol);
    $statement->bindParam(':gebruikersnaam', $gebruikersnaam);
    $statement->execute();

    header("Location: admin-pagina.php");
    exit();
}
