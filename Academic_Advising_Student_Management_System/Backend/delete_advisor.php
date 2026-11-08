<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM advisors WHERE advisor_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../Frontend/advisors.php?status=deleted");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    header("Location: ../Frontend/advisors.php");
}
?>