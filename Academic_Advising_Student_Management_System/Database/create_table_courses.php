<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

$sql = "CREATE TABLE IF NOT EXISTS courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(20) UNIQUE NOT NULL,
    course_name VARCHAR(100) NOT NULL,
    credit_hours INT NOT NULL,
    department_id INT,
    FOREIGN KEY (department_id) REFERENCES departments(department_id) ON DELETE SET NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'courses' created successfully.<br>";
} else {
    echo "Error creating table 'courses': " . $conn->error;
}
?>