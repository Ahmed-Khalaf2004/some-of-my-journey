<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "ecommerce_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS categories (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT
)";

if($conn->query($sql) === TRUE) {
    echo "Table categories created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}