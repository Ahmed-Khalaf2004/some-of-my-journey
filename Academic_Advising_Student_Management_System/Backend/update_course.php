<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['course_id'];
    $name = $_POST['course_name'];
    $code = $_POST['course_code'];
    $credits = $_POST['credit_hours'];
    $dep_id = $_POST['department_id'];

    $stmt = $conn->prepare("UPDATE courses SET course_name=?, course_code=?, credit_hours=?, department_id=? WHERE course_id=?");
    $stmt->bind_param("ssiii", $name, $code, $credits, $dep_id, $id);

    if ($stmt->execute()) {
        header("Location: ../frontend/courses.php?status=updated");
    }
}
?>