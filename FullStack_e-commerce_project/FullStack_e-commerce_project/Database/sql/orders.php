<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "ecommerce_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) UNSIGNED NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'paid', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
    shipping_address TEXT NOT NULL,
     /* ON DELETE RESTRICT to prevent deleting users with existing orders. */
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE RESTRICT
)";

if ($conn->query($sql) === TRUE) {
    echo "Table orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
