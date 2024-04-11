<?php
include 'connection.php';
$naam = $_POST['naam'];
$datum = $_POST['datum'];
$tijd = $_POST['tijd'];
$opmerking = $_POST['opmerking'];

$sql = "
INSERT INTO reserveren (naam, datum, tijd, opmerking)
  VALUES ('$naam', '$datum', '$tijd', '$opmerking')";

$conn->exec($sql);
echo '<script>location.href = "reserveren-pagina.php";</script>';
