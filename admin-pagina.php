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
    <h1 class="white-color align center">Reserveringen:</h1>
    <?php include('reserveringen.php'); ?>
    <div id="admin-form-align">
        <form id="admin-form" action="toevoegen.php" method="POST">
            <h1 class="white-color">Toevoegen:</h1>
            <input type="text" name="productnaam" placeholder="Vul de naam in van het product">
            <input type="text" name="omschrijving" placeholder="Vul de omschrijving in van het product">
            <input type="text" name="prijs" placeholder="Vul de prijs in van het product">
            <input type="text" name="img" placeholder="Vul path locatie van de image in">
            <input type="submit" value="Voeg toe">
        </form>

        <form id="admin-form" action="veranderen.php" method="POST">
            <h1 class="white-color">Wijzigen:</h1>
            <input type="number" name="id" placeholder="Voer product id in">
            <input type="text" name="newdisc" placeholder="Voer nieuwe omschrijving in">
            <input type="submit" value="Wijzig omschrijving">
        </form>

        <form id="admin-form" action="verwijderen.php" method="POST">
            <h1 class="white-color">Verwijderen:</h1>
            <input type="number" name="delete" id="delete" placeholder="Voer product id in">
            <input type="submit" value="Verwijder">
        </form>
    </div>
    <form id="admin-form" action="veranderen-rol.php" method="POST">
        <h1 class="white-color">Wijzigen van rol:</h1>
        <input type="text" name="gebruikersnaam" placeholder="Voer gebruikersnaam in">
        <input type="text" name="newrol" placeholder="Voer nieuwe rol in">
        <input type="submit" value="Wijzig rol">
    </form>
    <div id="zoek-center">
        <form id="zoekbalk">
            <div class="adres-box">
                <i class="fa-solid fa-magnifying-glass icon fa-xl"></i>
                <input id="zoekvak" type="text" name="search_query" placeholder="Zoeken (op naam, omschrijving of ID)">
            </div>
        </form>
    </div>
    <div class="menu">
        <?php include('producten-lijst.php'); ?>
    </div>
    <script>
        document.getElementById('zoekvak').addEventListener('input', function() {
            var searchQuery = this.value.trim();
            var formData = new FormData();
            formData.append("search_query", searchQuery);

            fetch('search.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    document.querySelector('.menu').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>