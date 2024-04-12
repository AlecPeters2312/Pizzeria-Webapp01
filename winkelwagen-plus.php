<?php
session_start();

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $_SESSION['cart'][] = $productId;
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
