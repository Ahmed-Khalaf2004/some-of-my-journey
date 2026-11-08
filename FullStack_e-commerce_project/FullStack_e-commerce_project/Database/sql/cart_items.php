<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "ecommerce_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE IF NOT EXISTS cart_items (
    cart_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) UNSIGNED NOT NULL,
    product_id INT(11) UNSIGNED NOT NULL,
    /*CHECK (quantity > 0) to ensure that the quantity is always a positive integer. */
    quantity INT(11) NOT NULL CHECK (quantity > 0) DEFAULT 1,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    /* UNIQUE(user_id, product_id) – each product appears once per user in cart. */
    UNIQUE(user_id, product_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table cart_items created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
