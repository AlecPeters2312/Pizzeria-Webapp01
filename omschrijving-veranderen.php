<?php
include('connection.php');

if ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'], $_POST['new_description'])) {
        $product_id = $_POST['product_id'];
        $new_description = $_POST['new_description'];

        $sql = "UPDATE producten SET omschrijving = '$new_description' WHERE id = $product_id";

        if ($conn->exec($sql)) {
            echo '<script>location.href = "admin-pagina.php";</script>';
            exit();
        } else {
            echo "Er is een fout opgetreden bij het bijwerken van de omschrijving.";
        }
    }
} else {
    echo "Database connection failed.";
}
?>
