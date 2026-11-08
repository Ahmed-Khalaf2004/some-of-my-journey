<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

$sql = "CREATE TABLE IF NOT EXISTS advising_sessions (
    session_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    advisor_id INT NOT NULL,
    session_date DATE NOT NULL,
    session_time TIME NOT NULL,
    advising_notes TEXT,
    recommendations TEXT,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE,
    FOREIGN KEY (advisor_id) REFERENCES advisors(advisor_id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'advising_sessions' created successfully.<br>";
} else {
    echo "Error creating table 'advising_sessions': " . $conn->error;
}
?>