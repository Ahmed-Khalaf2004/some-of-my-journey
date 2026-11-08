<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "ecommerce_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT(11) NOT NULL DEFAULT 0,
    image_url VARCHAR(255),
    /*  ON DELETE SET NULL to avoid deleting products if a category is deleted. */ 
    category_id INT(11) UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

