<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/user_managment.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userMang = new UserManagement($conn);

    // 1. تنظيف وتجهيز البيانات
    $email    = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // 2. محاولة تسجيل الدخول
    $result = $userMang->login($email, $password);

    // 3. التحقق من النتيجة
    if ($result === "email_not_found") {
        echo "Email not found. <a href='../Frontend/Public_and_Customer_Pages/register.php'>Register here</a>";
    } elseif ($result === "invalid_password") {
        echo "Invalid password. <a href='../Frontend/Public_and_Customer_Pages/login.php'>Try again</a>";
    } elseif ($result) {
        // تم تسجيل الدخول بنجاح، التوجيه حسب الدور
        if ($result["role"] == 'admin') {
            header("Location: ../Frontend/Admin_Pages/admin_dashboard.php");
        } else {
            header("Location: ../Frontend/Public_and_Customer_Pages/index.php");
        }
        exit();
    } else {
        echo "An error occurred. Please try again.";
    }
} else {
    // إذا تمت محاولة الوصول للملف مباشرة بدون POST
    header("Location: ../Frontend/Public_and_Customer_Pages/login.php");
    exit();
}