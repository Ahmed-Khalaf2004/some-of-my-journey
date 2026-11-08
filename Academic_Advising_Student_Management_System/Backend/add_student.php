<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $univ_id = $_POST['university_id'];
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $level = $_POST['level'];
    $cgpa = $_POST['cgpa'];
    $dep_id = $_POST['department_id'];

    $stmt = $conn->prepare("INSERT INTO students (university_id, first_name, last_name, email, mobile, level, cgpa, department_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssdi", $univ_id, $first, $last, $email, $mobile, $level, $cgpa, $dep_id);

    if ($stmt->execute()) {
        header("Location: ../Frontend/students.php?status=added");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>