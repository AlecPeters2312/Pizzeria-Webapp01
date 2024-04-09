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
    <form id="login" action="register.php" method="POST">
        <h1>Register</h1>
        <input class="login-input" type="text" name="gebruikersnaam" placeholder="Vul uw gebruikersnaam in">
        <input class="login-input" type="password" name="wachtwoord" placeholder="Vul uw wachtwoord in">
        <input class="login-submit" type="submit"value= "Bevestig">
    </form>
    <?php include('footer.php') ?>
</body>

</html>