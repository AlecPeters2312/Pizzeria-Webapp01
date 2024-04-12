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
    <?php include('header.php'); ?>
    <form id="login" action="reserveren.php" method="POST">
        <h1>Reserveren</h1>
        <h3>Voer een geldige datum in anders zien wij het niet!</h3>
        <input class="login-input" type="text" name="naam" placeholder="Vul uw naam in" required>
        <input class="login-input" type="date" name="datum" required>
        <input class="login-input" type="time" name="tijd" required>
        <input class="login-input" type="text" name="opmerking" placeholder="Vul eventueel een opmerking in">
        <input class="login-submit" type="submit" value="Bevestig">
    </form>
    <?php include('footer.php') ?>
</body>

</html>