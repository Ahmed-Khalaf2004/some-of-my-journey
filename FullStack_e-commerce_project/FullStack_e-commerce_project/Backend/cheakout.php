<?php
require_once __DIR__ . '/../includes/config.php'; 
require_once __DIR__ . '/product_managment.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['proceed_to_checkout'])) {
    $cartMang = new ProductManagement($conn);
    $userId = $_SESSION['user_id'];

    // حفظ الكميات المحدثة أولاً
    if (isset($_POST['quantity'])) {
        foreach ($_POST['quantity'] as $productId => $quantity) {
            $cartMang->updateCartQuantity($userId, (int)$productId, (int)$quantity);
        }
    }
    
}
?>