<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnAddToCart'])) {
    $productId = $_POST['product_id'];

    $sql = "SELECT * FROM winkelwagen WHERE product_id = :product_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':product_id', $productId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $sql = "UPDATE winkelwagen SET hoeveelheid = hoeveelheid + 1 WHERE product_id = :product_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
    } else {
        $sql = "INSERT INTO winkelwagen (product_id, hoeveelheid) VALUES (:product_id, 1)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
    }

    header("Location: winkelwagen.php");
    exit();
}

$sql = "SELECT SUM(hoeveelheid) AS total_quantity, product_id, totaal_prijs, prijs, id FROM winkelwagen";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result && $result['total_quantity'] > 0) {
    echo "<div class='product'>";
    echo "<p>Hoeveelheid: " . $result['total_quantity'] . "</p>";
    echo "<p>Totale Prijs: " . $result['totaal_prijs'] . "</p>";
    echo "<p> Prijs: " . $result['prijs'] . "</p>";
    echo "</div>";
} else {
    echo "<p>No product found in the shopping cart</p>";
}
