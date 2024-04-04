<?php
include ('connection.php');
$sql = "SELECT * FROM producten";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

if (count($result) > 0) {
    echo "<h1 class='id-tekst'>IDs met namen:</h1>";
    echo "<div class='product-ids'>";
    foreach ($result as $row) {
        echo "<div class='grid-item'>";
        echo "<h2>" . $row['id'] . "</h2>";
        echo "<h2>" . $row['productnaam'] . "</h2>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No products found";
}
?>
