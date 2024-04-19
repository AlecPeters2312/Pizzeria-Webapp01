<?php
include('connection.php');

$sql = "SELECT * FROM producten";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as $row) {
?>
    <div class='product'>
        <img src=<?php echo $row['img'] ?> alt='Pizza Afbeelding'>
        <h2> <?php echo $row['productnaam'] ?></h2>
        <p class='omschrijving'><?php echo $row['omschrijving']  ?></p>
        <p class='prijs'>€ <?php echo $row['prijs']  ?> </p>
        <form action='winkelwagen-plus.php' method='POST'>
            <input type='hidden' name='productId' value="<?php echo $row['id'] ?>">
            <input type='submit' value='Aan winkelwagen toevoegen'>
        </form>
    </div>
<?php
}
