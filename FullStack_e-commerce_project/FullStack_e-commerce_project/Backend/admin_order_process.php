<?php
require_once "../includes/config.php";
require_once "admin_managment.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order_id']) && isset($_POST['status'])) {
    
    $adminMang = new AdminManagment($conn);
    
    $order_id = intval($_POST['order_id']);
    $status   = $_POST['status']; // لا داعي لـ strip_tags لأننا نستخدم الـ ENUM

    // استدعاء دالة التحديث
    if ($adminMang->updateOrderStatus($order_id, $status)) {
        header("Location: ../admin/admin_orders.php?status=updated");
        exit();
    } else {
        echo "Error: Could not update order status.";
    }
} else {
    header("Location: ../admin/admin_orders.php");
    exit();
}