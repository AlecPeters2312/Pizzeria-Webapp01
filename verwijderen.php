<?php
include('connection.php');

if ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        $productId = $_POST['delete'];
        $sql = "DELETE FROM producten WHERE id = $productId";
        if ($conn->exec($sql)) {
            header("Location: admin-pagina.php");
            exit();
    }}}