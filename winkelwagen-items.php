<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('connection.php');

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $sql = "SELECT * FROM producten WHERE id IN ($productIds)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $row) { ?>
        <div class='product'>
            <img src='<?php echo $row['img']; ?>' alt='Pizza Afbeelding'>
            <h2><?php echo $row['productnaam']; ?></h2>
            <p class='omschrijving'><?php echo $row['omschrijving']; ?></p>
            <p class='prijs'>€ <?php echo $row['prijs']; ?></p>
            <form action='winkelwagen-min.php' method='POST'>
                <input type='hidden' name='product_id' value='<?php echo $row['id']; ?>'>
                <input type='submit' value='Verwijder'>
            </form>
        </div>
    <?php }
} else { ?>
    <div class='product'>
        Uw winkelwagen is leeg
    </div>
<?php }
