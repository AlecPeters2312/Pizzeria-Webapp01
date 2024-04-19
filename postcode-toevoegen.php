<?php
include('connection.php');

$postcode = $_POST['postcode'];

$sql = "INSERT INTO klantgegevens (postcode) VALUES (:postcode)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':postcode', $postcode);

if ($stmt->execute()) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
}