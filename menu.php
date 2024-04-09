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
    <div id="zoek-center">
        <form id="zoekbalk">
            <div class="adres-box">
                <i class="fa-solid fa-magnifying-glass icon fa-xl"></i>
                <input id="zoekvak" type="text" name="search_query" placeholder="Zoeken (op naam of omschrijving)">
            </div>
        </form>
    </div>
    <div class="menu">
        <?php include('connection.php'); ?>
        <?php include('menu-producten.php'); ?>
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