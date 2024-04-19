<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['productId'];
    $newdisc = $_POST['newdisc'];

    $sql = "UPDATE producten SET omschrijving=:newdisc WHERE id = :id;";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':newdisc', $newdisc);
    $statement->bindParam(':id', $id);
    $statement->execute();

    header("Location: admin-pagina.php");
}