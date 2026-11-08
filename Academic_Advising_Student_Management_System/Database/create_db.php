<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "advising_system_db";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS `$dbname`";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>