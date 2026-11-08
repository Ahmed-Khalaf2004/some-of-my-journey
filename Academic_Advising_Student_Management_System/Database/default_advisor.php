<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

$hashed_password = password_hash("123456", PASSWORD_DEFAULT);

$sql = "INSERT INTO advisors (first_name, last_name, university_email, password) 
        VALUES ('Ahmed', 'Khalaf', 'admin@university.edu', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Test user created successfully.";
} else {
    echo "Error: " . $conn->error;
}
?>