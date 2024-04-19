<?php
include('connection.php');

if (isset($_POST['search_query'])) {
    $search_query = '%' . $_POST['search_query'] . '%';

    $sql = "SELECT * FROM producten WHERE productnaam LIKE :search_query OR omschrijving LIKE :search_query OR id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':search_query', $search_query);
    $stmt->bindParam(':id', $_POST['search_query']);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (count($result) > 0) {
        foreach ($result as $row) {
?>
            <div class='product'>
                <img src=<?php echo $row['img'] ?> alt='Pizza Afbeelding'>
                <h2><?php echo $row['productnaam'] ?></h2>
                <p class='omschrijving'><?php echo $row['omschrijving'] ?></p>
                <p class='prijs'>€ <?php echo $row['prijs'] ?></p>
                <form action='winkelwagen-plus.php' method='POST'>
                    <input type='hidden' name='product_id' value='<?php echo $row['id'] ?>'>
                    <input type='submit' value='Aan winkelwagen toevoegen'>
                </form>
            </div>
<?php }
    } else {
        echo "No products found";
    }
} else {
    echo "No search query provided";
}