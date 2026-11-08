<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // البحث في جدول المستشارين
    $stmt = $conn->prepare("SELECT advisor_id AS id, password, 'advisor' as role FROM advisors WHERE university_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    // إذا لم يوجد، البحث في جدول الطلاب
    if (!$user) {
        $stmt = $conn->prepare("SELECT student_id AS id, password, 'student' as role FROM students WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
    }

    if ($user && password_verify($password, $user['password'])) {
        // تخزين البيانات في الجلسة
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        
        header("Location: ../frontend/dashboard.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>