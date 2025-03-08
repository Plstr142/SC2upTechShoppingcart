<?php
session_start();
include 'config.php';

// ตรวจสอบว่าตัวแปร $_SESSION['cart'] มีอยู่หรือไม่ ถ้าไม่มีให้กำหนดเป็น array ว่าง
// if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
//     $_SESSION['cart'] = [];
// }

if (!empty($_GET['id'])) {
    if (empty($_SESSION['cart'][$_GET['id']])) {
        $_SESSION['cart'][$_GET['id']] = 1;
    } else {
        $_SESSION['cart'][$_GET['id']] += 1;
    }

    $_SESSION['message'] = 'Cart addded successfully';
}

header('location: ' . $base_url . '/product-list.php');

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $product_id = $_POST['product_id'];
//     $quantity = $_POST['quantity'];

//     if (!isset($_SESSION['cart'][$product_id])) {
//         $_SESSION['cart'] = [];
//     }

//     if (isset($_SESSION['cart'][$product_id])) {
//         $_SESSION['cart'][$product_id] += $quantity;
//     } else {
//         $_SESSION['cart'][$product_id] = $quantity;
//     }

//     echo json_encode(['message' => 'Product added to cart']);
// }
