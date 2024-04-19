<?php
session_start();

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        if (($key = array_search($productId, $_SESSION['cart'])) == true) {
            unset($_SESSION['cart'][$key]);
        }
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
