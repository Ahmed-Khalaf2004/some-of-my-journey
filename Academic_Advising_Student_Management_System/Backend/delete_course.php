<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM courses WHERE course_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: ../frontend/courses.php?status=deleted");
}
?>