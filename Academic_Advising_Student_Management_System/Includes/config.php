 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<?php
session_start();
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "advising_system_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $conn->set_charset("utf8mb4");

?>