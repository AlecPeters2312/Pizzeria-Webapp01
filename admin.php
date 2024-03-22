<head>
    <link rel="stylesheet" href="css/style.css" />
</head>

<?php
include ('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset ($_POST['productnaam'], $_POST['omschrijving'], $_POST['prijs'])) {
        $productnaam = $_POST['productnaam'];
        $omschrijving = $_POST['omschrijving'];
        $prijs = $_POST['prijs'];

        $sql = "INSERT INTO producten (productnaam, omschrijving, prijs)
        VALUES ('$productnaam', '$omschrijving', '$prijs')";

        if ($conn->exec($sql)) {
            echo "<p class='success-bericht'>Succesvol toegevoegd!</p>";
            header("refresh:2; url=index.php");
            exit();
        } else {
            echo "Er is een fout opgetreden bij het toevoegen van het product aan de database.";
        }
    } else {
        echo "Niet alle velden zijn ingevuld.";
    }
}
?>