<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['department_id'];
    $name = $_POST['department_name'];
    $code = $_POST['department_code'];

    $stmt = $conn->prepare("UPDATE departments SET department_name = ?, department_code = ? WHERE department_id = ?");
    $stmt->bind_param("ssi", $name, $code, $id);

    if ($stmt->execute()) {
        header("Location: ../Frontend/departments.php?status=updated");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>