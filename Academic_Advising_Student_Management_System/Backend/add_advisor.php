<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dep_id = $_POST['department_id'];
    $email = $_POST['university_email'];
    $office = $_POST['office_number'];
    $phone = $_POST['phone_number'];

    // إضافة الحقول الجديدة للاستعلام
    $stmt = $conn->prepare("INSERT INTO advisors (first_name, last_name, department_id, university_email, office_number, phone_number) VALUES (?, ?, ?, ?, ?, ?)");
    
    // النوع "siisss": string, string, integer, string, string, string
    $stmt->bind_param("siisss", $first_name, $last_name, $dep_id, $email, $office, $phone);

    if ($stmt->execute()) {
        header("Location: ../Frontend/advisors.php?status=added");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>