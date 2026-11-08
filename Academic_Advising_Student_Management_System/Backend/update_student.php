<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['student_id'];
    $univ_id = $_POST['university_id'];
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $dep_id = $_POST['department_id'];

    $stmt = $conn->prepare("UPDATE students SET university_id=?, first_name=?, last_name=?, department_id=? WHERE student_id=?");
    $stmt->bind_param("sssii", $univ_id, $first, $last, $dep_id, $id);

    if ($stmt->execute()) {
        header("Location: ../Frontend/students.php?status=updated");
    }
}
?>