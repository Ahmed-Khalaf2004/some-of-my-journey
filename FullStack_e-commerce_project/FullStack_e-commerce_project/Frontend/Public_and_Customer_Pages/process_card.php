<?php
require_once '../../includes/config.php'; 
require_once '../../Backend/product_managment.php';
// var_dump($_POST); die();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$productsMan = new ProductManagement($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // استقبال الـ ID والكمية
    $product_id = intval($_POST['product_id']);
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1; // التأكد من وجود قيمة
    $user_id = $_SESSION['user_id'];

    // تمرير القيم للدالة
    $message = $productsMan->addToCart($user_id, $product_id, $quantity);
    
    // رسالة للمستخدم
    $_SESSION['message'] = $message;
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>