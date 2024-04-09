<?php
include('connection.php');

$productnaam = $_POST['productnaam'];
$omschrijving = $_POST['omschrijving'];
$prijs = $_POST['prijs'];
$img = $_POST['img'];

$sql = "INSERT INTO producten (productnaam, omschrijving, prijs, img)
        VALUES ('$productnaam', '$omschrijving', '$prijs', '$img')";

if ($conn->exec($sql)) {
    header("Location: admin-pagina.php");
    exit();
}
