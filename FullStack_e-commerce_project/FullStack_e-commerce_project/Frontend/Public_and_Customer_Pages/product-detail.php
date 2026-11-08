<!-- Dynamic page – use query string ?id=... -->
<?php 
require_once __DIR__ . '/../../includes/config.php'; 
require_once __DIR__ . '/../../Backend/product_managment.php';
$productId = isset($_GET['productId'])? $_GET['productId'] : null;

$proMan = new ProductManagement($conn);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/css/customer.css">
    <title>Product Details</title>
  </head>
  <body>
    <h1>Product Details</h1>   
    <?php include __DIR__ . '/../../includes/header.php'; ?>
    <main>
      <section class="product-detail">
        <!--PHP: Fetch product details from the database using the ID from the query string -->
        <?php
        $productDetails = $proMan->fetchProduct($productId);
        echo<<< "productDet"
        <h2 class="product-name">{$productDetails['id']}</h2>
        <p class="description">Description: {$productDetails['description']}</p>
        <p class="price">Price: {$productDetails['price']}\$</p>
        <p class="stock">Number in Stock: {$productDetails['stock_quantity']}</p>
        <img src="{$productDetails['image_url']}" alt="Product Image" />
        Quantity selector (number input, min=1, max=stock)
        <form action="process_card.php" method="post">
            <input type="hidden" name="product_id" value="{$productDetails['id']}">
            <input type="number" name="quantity" value="1" min="1" max="{$productDetails['stock_quantity']}>
            <input type="submit" value="Add to Cart">
        </form>
        productDet;
        //  1.  Still not do: for guests:
        //        first step: can use JavaScript localStorage.
        //        second step: but specification requires eventual database storage after login). 
        ?>
      </section>
      <section id="back-to-products">
        <a href="products.php">← Back to Products</a>
      </section>
    </main>
     <?php include __DIR__ . '/../../includes/footer.php'; ?>
  </body>
</html>
