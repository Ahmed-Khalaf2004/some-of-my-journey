<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/user_managment.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userMang = new UserManagement($conn);

    // 1. التطهير (Sanitization)
    $full_name = htmlspecialchars(strip_tags($_POST['full_name']));
    $email     = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password  = $_POST['password'];
    $conf_pass = $_POST['confirm_password'];
    $phone     = htmlspecialchars(strip_tags($_POST['phone']));
    $address   = htmlspecialchars(strip_tags($_POST['address']));

    if ($password !== $conf_pass) {
        die("Passwords do not match!");
    }

    if ($userMang->emailExists($email)) {
        die("Email is already registered!");
    }

    if ($userMang->register($full_name, $email, $password, $phone, $address)) {
        header("Location: /../../Frontend/Public_and_Customer_Pages/login.php?status=success");
        exit();
    } else {
        echo "Error: Could not register user.";
    }
}