<?php
require_once __DIR__ . '/../../includes/config.php'; 
require_once __DIR__ . '/../../Backend/product_managment.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $product_id = (int)$_GET['id'];
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM cart_items WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    
    if ($stmt->execute()) {
        header("Location: cart.php?message=removed");
    } else {
        header("Location: cart.php?error=failed");
    }
    exit();
} else {
    header("Location: cart.php");
    exit();
}
?>