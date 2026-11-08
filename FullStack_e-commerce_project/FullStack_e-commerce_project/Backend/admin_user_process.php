<?php
require_once "../includes/config.php";
require_once "admin_managment.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id']) && isset($_POST['role'])) {
    
    $adminMang = new AdminManagment($conn);
    
    $user_id = intval($_POST['user_id']);
    $role    = $_POST['role']; // customer أو admin

    // استدعاء دالة تحديث الدور
    if ($adminMang->updateUserRole($user_id, $role)) {
        header("Location: ../admin/admin_users.php?status=updated");
        exit();
    } else {
        echo "Error: Could not update user role.";
    }
} else {
    header("Location: ../admin/admin_users.php");
    exit();
}