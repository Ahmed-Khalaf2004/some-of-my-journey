<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

$sql = "CREATE TABLE IF NOT EXISTS advisors (
    advisor_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    university_email VARCHAR(100) UNIQUE NOT NULL,
    office_number VARCHAR(20),
    phone_number VARCHAR(20),
    department_id INT,
    FOREIGN KEY (department_id) REFERENCES departments(department_id) ON DELETE SET NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'advisors' created successfully.<br>";
} else {
    echo "Error creating table 'advisors': " . $conn->error;
}
?>