<?php
include('connection.php');

if ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
        $productId = $_POST['delete_product'];
        $sql = "DELETE FROM producten WHERE id = $productId";
        if ($conn->exec($sql)) {
            header("Location: admin-pagina.php");
        }
    }
}