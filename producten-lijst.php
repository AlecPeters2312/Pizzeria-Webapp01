<?php
include ('connection.php');
$sql = "SELECT * FROM producten";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

if (count($result) > 0) {
    foreach ($result as $row) {
        echo "<div class='product'>";
        echo "<img src='" . $row['img'] . "' alt='Pizza Afbeelding'>";
        echo "<h2>ID: " . $row['id'] . "</h2>";
        echo "<h2>" . $row['productnaam'] . "</h2>";
        echo "<p class='omschrijving'>" . $row['omschrijving'] . "</p>";
        echo "<p class='prijs'>€ " . $row['prijs'] . "</p>";
        echo "<a class='plus' href='index.php'>+</a>";
        echo "</div>";
    }
} else {
    echo "No products found";
}