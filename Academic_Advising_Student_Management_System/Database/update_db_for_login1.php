<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php";

$sql = "ALTER TABLE advisors ADD password VARCHAR(255) NOT NULL";

if ($conn->query($sql) === TRUE) {
    echo "Table 'advisors' updated successfully: 'password' column added.";
} else {
    echo "Error updating table: " . $conn->error;
}

$conn->close();
?>