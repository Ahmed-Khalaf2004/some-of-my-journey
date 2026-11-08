<?php

// التحقق مما إذا كان المستخدم مسجل دخول وصلاحيته admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // إذا لم يكن admin، يتم توجيهه لصفحة تسجيل الدخول
    header("Location: ../../Frontend/Public_and_Customer_Pages/login.php?error=unauthorized");    exit();
}
?>