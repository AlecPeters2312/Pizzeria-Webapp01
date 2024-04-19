<?php
session_start();

if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $_SESSION['cart'][] = $productId;
}

header("Location: " . $_SERVER['HTTP_REFERER']);
