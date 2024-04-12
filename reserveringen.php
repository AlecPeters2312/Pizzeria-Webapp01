<?php
include('connection.php');

if ($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        $reserveringId = $_POST['delete'];
        $sql = "DELETE FROM reserveren WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $reserveringId);
        if ($stmt->execute()) {
            header("Location: admin-pagina.php");
            exit();
        }
    }
}

$sql = "SELECT * FROM reserveren";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as $row) {
    echo "<div class='product'>";
    echo "<h3>Naam: " . $row['naam'] . "</h3>";
    echo "<h3>Datum: " . $row['datum'] . "</h3>";
    echo "<h3>Tijd: " . $row['tijd'] . "</h3>";
    echo "<h3>Opmerking: " . $row['opmerking'] . "</h3>";
    echo "<form method='POST'>";
    echo "<input type='hidden' name='delete' value='" . $row['id'] . "'>";
    echo "<input type='submit' value='Verwijder reservering'>";
    echo "</form>";
    echo "</div>";
}
