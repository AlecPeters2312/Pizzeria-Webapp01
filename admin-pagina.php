<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <title>Pizzeria</title>
</head>

<body>
  <?php
  include ('header.php');
  include ('connection.php');
  ?>
  <form action="admin.php" method="POST">
    <input type="text" name="productnaam" placeholder="Vul de naam in van het product">
    <input type="text" name="omschrijving" placeholder="Vul de omschrijving in van het product">
    <input type="text" name="prijs" placeholder="Vul de prijs in van het product">
    <input type="submit">
  </form>
  <?php include ('footer.php') ?>
</body>