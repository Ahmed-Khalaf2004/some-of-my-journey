<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

$sql = "CREATE TABLE IF NOT EXISTS registrations (
    registration_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    semester VARCHAR(20) NOT NULL,
    academic_year VARCHAR(10) NOT NULL,
    registration_date DATE NOT NULL,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(course_id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'registrations' created successfully.<br>";
} else {
    echo "Error creating table 'registrations': " . $conn->error;
}
?>