<?php
require_once "../includes/config.php";
require_once "admin_managment.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    
    $adminMang = new AdminManagment($conn);

    // 1. استقبال وتطهير البيانات
    $name        = htmlspecialchars(strip_tags($_POST['name']));
    $description = htmlspecialchars(strip_tags($_POST['description']));
    $price       = floatval($_POST['price']); // تحويل السعر لـ float
    $stock       = intval($_POST['stock_quantity']);   // تحويل المخزون لـ integer
    $image_url   = filter_var($_POST['image_url'], FILTER_SANITIZE_URL);
    $category_id = intval($_POST['category_id']);

    if ($adminMang->addProduct($name, $description, $price, $stock, $image_url, $category_id)) {
        header("Location: ../Frontend/Admin_Pages/admin_products.php?status=success");
        exit();
    } else {
        echo "Error: Could not add product.";
    }
} else {
    header("Location: ../Frontend/Admin_Pages/admin_products.php");
    exit();
}