<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['department_name'];
    $code = $_POST['department_code'];

    // استخدام Prepared Statement للإضافة الآمنة
    $stmt = $conn->prepare("INSERT INTO departments (department_name, department_code) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $code);

    if ($stmt->execute()) {
        header("Location: ../Frontend/departments.php?status=added");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>