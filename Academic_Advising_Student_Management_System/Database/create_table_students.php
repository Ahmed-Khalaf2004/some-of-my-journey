<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

$sql = "CREATE TABLE IF NOT EXISTS students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    university_id VARCHAR(20) UNIQUE NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    gender VARCHAR(10),
    date_of_birth DATE,
    email VARCHAR(100) UNIQUE NOT NULL,
    mobile VARCHAR(20),
    level VARCHAR(20),
    cgpa DECIMAL(3, 2),
    department_id INT,
    advisor_id INT,
    FOREIGN KEY (department_id) REFERENCES departments(department_id) ON DELETE SET NULL,
    FOREIGN KEY (advisor_id) REFERENCES advisors(advisor_id) ON DELETE SET NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'students' created successfully.<br>";
} else {
    echo "Error creating table 'students': " . $conn->error;
}
?>