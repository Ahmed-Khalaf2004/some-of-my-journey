<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "ecommerce_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE IF NOT EXISTS order_items (
    order_item_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT(11) UNSIGNED NOT NULL,
    product_id INT(11) UNSIGNED NOT NULL,
    quantity INT(11) NOT NULL DEFAULT 1,
    unit_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table order_items created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
