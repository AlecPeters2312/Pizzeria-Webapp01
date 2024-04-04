<?php
include('connection.php');

if(isset($_POST['search_query'])) {
    $search_query = '%' . $_POST['search_query'] . '%';
    
    $sql = "SELECT * FROM producten WHERE productnaam LIKE :search_query OR omschrijving LIKE :search_query";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':search_query', $search_query, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    if (count($result) > 0) {
        foreach ($result as $row) {
            echo "<div class='product'>";
            echo "<img src='" . $row['img'] . "' alt='Pizza Afbeelding'>";
            echo "<h2>" . $row['productnaam'] . "</h2>";
            echo "<p class='omschrijving'>" . $row['omschrijving'] . "</p>";
            echo "<p class='prijs'>€ " . $row['prijs'] . "</p>";
            echo "<a class='plus' href='index.php'>+</a>";
            echo "</div>";
        }
    } else {
        echo "No products found";
    }
} else {
    echo "No search query provided";
}
?>
