<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $semester = $_POST['semester'];
    $academic_year = $_POST['academic_year'];
    $registration_date = date("Y-m-d");

    $stmt = $conn->prepare("INSERT INTO registrations (student_id, course_id, semester, academic_year, registration_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $student_id, $course_id, $semester, $academic_year, $registration_date);

    if ($stmt->execute()) {
        header("Location: ../Frontend/registration.php?status=success");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>