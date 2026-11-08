<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM departments WHERE department_id = $id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../Frontend/departments.php?status=deleted");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
$conn->close();
?>