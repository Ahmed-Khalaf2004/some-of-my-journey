<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

$sql = "CREATE TABLE IF NOT EXISTS departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL,
    department_code VARCHAR(20) UNIQUE NOT NULL,
    office_location VARCHAR(150)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'departments' created successfully.<br>";
} else {
    echo "Error creating table 'departments': " . $conn->error;
}
?>