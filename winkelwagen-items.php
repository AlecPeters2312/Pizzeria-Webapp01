<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('connection.php');

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $productIds = implode(",", $_SESSION['cart']);

    $sql = "SELECT * FROM producten WHERE id IN ($productIds)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $row) {
        echo "<div class='product'>";
        echo "<img src='" . $row['img'] . "' alt='Pizza Afbeelding'>";
        echo "<h2>" . $row['productnaam'] . "</h2>";
        echo "<p class='omschrijving'>" . $row['omschrijving'] . "</p>";
        echo "<p class='prijs'>€ " . $row['prijs'] . "</p>";
        echo "<form action='winkelwagen-min.php' method='POST'>";
        echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Verwijder'>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "<div class='product'>";
    echo "Uw winkelwagen is leeg";
    echo "</div>";
}
