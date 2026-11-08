<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM students WHERE student_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../Frontend/students.php?status=deleted");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    $stmt->close();
} else {
    header("Location: ../Frontend/students.php");
}
?>