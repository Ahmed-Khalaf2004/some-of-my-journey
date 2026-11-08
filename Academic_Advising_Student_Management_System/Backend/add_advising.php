<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO advising_sessions (student_id, advisor_id, session_date, session_time, advising_notes, recommendations) VALUES (?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("iissss", 
        $_POST['student_id'], 
        $_POST['advisor_id'], 
        $_POST['session_date'], 
        $_POST['session_time'], 
        $_POST['advising_notes'], 
        $_POST['recommendations']
    );

    if ($stmt->execute()) {
        header("Location: ../frontend/advising.php?status=success");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>