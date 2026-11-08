<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['advisor_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dep_id = $_POST['department_id'];
    $email = $_POST['university_email'];
    $office = $_POST['office_number'];
    $phone = $_POST['phone_number'];

    $stmt = $conn->prepare("UPDATE advisors SET first_name=?, last_name=?, department_id=?, university_email=?, office_number=?, phone_number=? WHERE advisor_id=?");
    $stmt->bind_param("ssisssi", $first_name, $last_name, $dep_id, $email, $office, $phone, $id);

    if ($stmt->execute()) {
        header("Location: ../frontend/advisors.php?status=updated");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>