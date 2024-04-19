<?php
include('connection.php');
$sql = "SELECT * FROM producten";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

if (count($result) > 0) {
    foreach ($result as $row) {
?>
        <div class='product'>
            <img src=<?php echo $row['img'] ?> alt='Pizza Afbeelding'>
            <h2>ID: <?php echo $row['id'] ?> </h2>
            <h2> <?php echo $row['productnaam'] ?></h2>
            <form class="omschrijving-div" action='veranderen.php' method='POST'>
                <input type='hidden' name='productId' value="<?php echo $row['id'] ?>">
                <input class="omschrijving-text" type='text' name='newdisc' value="<?php echo $row['omschrijving'] ?>">
                <input type='submit' name="update_disc" value='Omschrijving updaten'>
            </form>
            <form action='verwijderen.php' method='POST'>
                <input type='hidden' name='delete_product' value=" <?php echo $row['id'] ?> ">
                <input type='submit' value='Product verwijderen'>
            </form>
        </div>
<?php
    }
} else {
    echo "No products found";
}
