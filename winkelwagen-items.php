<?php
include('connection.php');

function redirectToCorrectPage()
{
    header("Location: " . (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'winkelwagen.php') !== false ? 'winkelwagen.php' : 'menu.php'));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnAddToCart']) || isset($_POST['btnRemoveFromCart'])) {
    $productId = $_POST['product_id'];
    $sql = "SELECT * FROM winkelwagen WHERE product_id = :product_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':product_id', $productId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $sql = "UPDATE winkelwagen SET hoeveelheid = hoeveelheid " . (isset($_POST['btnAddToCart']) ? '+' : '-') . " 1 WHERE product_id = :product_id";
    } else {
        $sql = "INSERT INTO winkelwagen (product_id, hoeveelheid) VALUES (:product_id, 1)";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':product_id', $productId);
    $stmt->execute();

    redirectToCorrectPage();
}

$sql = "SELECT SUM(hoeveelheid) AS total_quantity, product_id, totaal_prijs, prijs, id FROM winkelwagen";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result && $result['total_quantity'] > 0) {
    echo "<div class='product'>";
    echo "<h2>Aantal Producten: " . $result['total_quantity'] . "</h2>";
    echo "<form class='plus-minus' method='post' action=''>";
    echo "<input type='hidden' name='product_id' value='" . $result['id'] . "'>";
    echo "<button type='submit' name='btnAddToCart'>+</button>";
    echo "</form>";
    echo "<form class='plus-minus' method='post' action=''>";
    echo "<input type='hidden' name='product_id' value='" . $result['id'] . "'>";
    echo "<button type='submit' name='btnRemoveFromCart'>–</button>";
    echo "</form>";
    echo "</div>";
} else {
    echo "<div class='product'>";
    echo "<p>Geen product gevonden in de winkelwagen</p>";
    echo "</div>";
}
