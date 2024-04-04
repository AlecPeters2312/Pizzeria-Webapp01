<?php
include('connection.php');

if ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        $productId = $_POST['delete'];
        $sql = "DELETE FROM producten WHERE id = $productId";
        if ($conn->exec($sql)) {
            echo '<script>location.href = "admin-pagina.php";</script>';
            exit();
        } else {
            echo "Er is een fout opgetreden bij het verwijderen van het product.";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productnaam'], $_POST['omschrijving'], $_POST['prijs'])) {
        $productnaam = $_POST['productnaam'];
        $omschrijving = $_POST['omschrijving'];
        $prijs = $_POST['prijs'];

        $sql = "INSERT INTO producten (productnaam, omschrijving, prijs)
        VALUES ('$productnaam', '$omschrijving', '$prijs')";

        if ($conn->exec($sql)) {
            echo '<script>location.href = "admin-pagina.php";</script>';
            exit();
        } else {
            echo "Er is een fout opgetreden bij het toevoegen van het product aan de database.";
        }
    }
} else {
    echo "Database connection failed.";
}