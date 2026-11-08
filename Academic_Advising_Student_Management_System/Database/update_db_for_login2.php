<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

$sql = "ALTER TABLE students ADD COLUMN password VARCHAR(255) NOT NULL";

if ($conn->query($sql) === TRUE) {
    echo "Column 'password' added to 'students' table successfully.";
} else {
    echo "Error adding column: " . $conn->error;
}

$conn->close();
?>