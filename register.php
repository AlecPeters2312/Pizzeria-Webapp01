<?php

global $conn;
include('connection.php');

$adres= 'postcode';

$sql = "
INSERT INTO klantgegevens (postcode)
  VALUES ('$adres')";

$conn->exec($sql);