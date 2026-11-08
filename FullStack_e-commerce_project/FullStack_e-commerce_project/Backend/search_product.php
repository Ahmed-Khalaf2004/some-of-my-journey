<?php
include __DIR__ . "/../includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/customer.css">
    <title>Search Product</title>
</head>
<body>
    
</body>
</html>
<?php
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $serProd = strtolower(trim($_GET['search']));
    $found = false;
    while($row = $result->fetch_assoc()){
        $prodName = strtolower($row['name']);
        if($prodName == $serProd){
            $found = true;
            echo "<div class='product-card'>
                    <img src='{$row['image_url']}' alt='{$row['name']}'>
                    <h3>{$row['name']}</h3>
                    <p>Price: {$row['price']}</p>
                    <p>Stock Quantity: {$row['stock_quantity']}</p>
                    <p>Description: {$row['description']}</p>
                </div>";
        }
    }
    if(!$found){
        echo "<p>No products found matching your search.</p>";
    }

}else{
    echo "problem at request method";
}