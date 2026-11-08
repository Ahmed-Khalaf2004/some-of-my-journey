<?php
$host = 'localhost';
$dbname = 'hospital'; 
$username = 'root';
$password = 'ahmed.amjad.2022.2004';       

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected successfuly!";
} catch (PDOException $e) {
    echo  "faildddddddddd:((((((((, The error: " . $e->getMessage();
}
?>