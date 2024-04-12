<?php
include('connection.php');

$sql = "SELECT * FROM producten";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as $row) {
    echo "<div class='product'>";
    echo "<img src='" . $row['img'] . "' alt='Pizza Afbeelding'>";
    echo "<h2>" . $row['productnaam'] . "</h2>";
    echo "<p class='omschrijving'>" . $row['omschrijving'] . "</p>";
    echo "<p class='prijs'>€ " . $row['prijs'] . "</p>";
    echo "<form action='winkelwagen-plus.php' method='POST'>";
    echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
    echo "<input type='submit' value='Add to Cart'>";
    echo "</form>";
    echo "</div>";
}
