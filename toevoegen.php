<?php
include('connection.php');

$productnaam = $_POST['productnaam'];
$omschrijving = $_POST['omschrijving'];
$prijs = $_POST['prijs'];
$img = $_POST['img'];

$sql = "INSERT INTO producten (productnaam, omschrijving, prijs, img) VALUES (:productnaam, :omschrijving, :prijs, :img)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':productnaam', $productnaam);
$stmt->bindParam(':omschrijving', $omschrijving);
$stmt->bindParam(':prijs', $prijs);
$stmt->bindParam(':img', $img);

if ($stmt->execute()) {
    header("Location: admin-pagina.php");
    exit();
} else {
    echo "Error: " . $stmt->errorInfo()[2];
}
