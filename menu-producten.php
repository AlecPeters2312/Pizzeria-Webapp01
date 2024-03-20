<?php
$sql = "SELECT * FROM producten";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

if (count($result) > 0) {
    foreach ($result as $row) {
        echo "<div class='product'>";
        echo "<h2>" . $row['productnaam'] . "</h2>";
        echo "<p class='description'>" . $row['omschrijving'] . "</p>";
        echo "<p class='price'>" . $row['prijs'] . "</p>";
        echo "</div>";
    }
} else {
    echo "No products found";
}