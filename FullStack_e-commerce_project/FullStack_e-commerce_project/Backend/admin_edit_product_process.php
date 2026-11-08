<?php
require_once "../includes/config.php";
require_once "admin_managment.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_product'])) {
    
    $adminMang = new AdminManagment($conn);

    // 1. استقبال البيانات (بما في ذلك الـ ID المخفي)
    $id          = intval($_POST['id']);
    $name        = htmlspecialchars(strip_tags($_POST['name']));
    $description = htmlspecialchars(strip_tags($_POST['description']));
    $price       = floatval($_POST['price']);
    $stock       = intval($_POST['stock_quantity']);
    $image_url   = filter_var($_POST['image_url'], FILTER_SANITIZE_URL);
    $category_id = intval($_POST['category_id']);

    // 2. استدعاء دالة التحديث
    if ($adminMang->editProduct($id, $name, $description, $price, $stock, $image_url, $category_id)) {
        header("Location: ../Frontend/Admin_Pages/admin_products.php?status=updated");
        exit();
    } else {
        echo "Error: Could not update product.";
    }
} else {
    header("Location: ../FrontendAdmin_Pages/admin_products.php");
    exit();
}