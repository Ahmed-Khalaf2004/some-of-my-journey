<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

$hashed_password = password_hash("student123", PASSWORD_DEFAULT);

$sql = "INSERT INTO students (university_id, first_name, last_name, email, password) 
        VALUES ('S1001', 'Ali', 'Ahmed', 'ali@university.edu', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Student added successfully.";
} else {
    echo "Error: " . $conn->error;
}
?>