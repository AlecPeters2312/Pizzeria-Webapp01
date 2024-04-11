<?php
include('connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
} else {
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
        echo "<form class='plus-minus' method='post' action='winkelwagen.php'>";
        echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
        echo "<button type='submit' name='btnAddToCart'>+</button>";
        echo "</form>";
        echo "<form class='plus-minus' method='post' action='winkelwagen.php'>";
        echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
        echo "<button type='submit' name='btnRemoveFromCart'>–</button>";
        echo "</form>";
        echo "</div>";
    }
}
