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
    <?php include('header.php'); 
         include('producten-lijst.php'); ?>

<div id="admin-form-align">

<form id="admin-form" action="admin.php" method="POST">
<h1 class="white-color">Toevoegen:</h1>
    <input type="text" name="productnaam" placeholder="Vul de naam in van het product">
    <input type="text" name="omschrijving" placeholder="Vul de omschrijving in van het product">
    <input type="text" name="prijs" placeholder="Vul de prijs in van het product">
    <input type="submit" value="Voeg toe">
</form>

<form id="admin-form" action="omschrijving-veranderen.php" method="POST">
<h1 class="white-color">Wijzigen:</h1>
    <input type="number" name="product_id" placeholder="Voer product id in">
    <input type="text" name="new_description" placeholder="Voer nieuwe omschrijving in">
    <input type="submit" value="Wijzig omschrijving">
</form>

<form id="admin-form" action="admin.php" method="POST">
<h1 class="white-color">Verwijderen:</h1>
    <input type="number" name="delete" id="delete" placeholder="Voer product id in">
    <input type="submit" value="Verwijder">
</form>
</div>

    <?php include('footer.php') ?>
</body>

</html>