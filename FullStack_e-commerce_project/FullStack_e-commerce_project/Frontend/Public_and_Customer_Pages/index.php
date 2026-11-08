<?php 
require_once __DIR__ . '/../../includes/config.php'; 
require_once __DIR__ . '/../../Backend/product_managment.php'; 
$proMana = new ProductManagement($conn);
?>
<?php if(isset($_SESSION['message'])): ?>
    <div class="alert"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
<?php endif; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/css/customer.css"> 
    <title>Home</title>
  </head>
  <body>
      <?php if (isset($_SESSION['message'])): ?>
      <div id="flash-msg" class="alert">
          <?php 
              echo $_SESSION['message']; 
              unset($_SESSION['message']); // حذف الرسالة بعد عرضها لمرة واحدة
          ?>
      </div>
    
      <script>
          // إخفاء الرسالة تلقائياً بعد 3 ثوانٍ
          setTimeout(function() {
              var msg = document.getElementById('flash-msg');
              if(msg) msg.style.opacity = '0';
          }, 3000);
      </script>
      <?php endif; ?>
      <h1>Home</h1>   
      <?php include __DIR__ . '/../../includes/header.php'; ?>
    <main>
      <!-- <section> -->
        <h2>Welcome to our store!</h2>
        <a href="products.php" class="view-products-btn-login-logout">View Products</a>
      <!-- </section> -->
      <!-- <section> -->
        <div id="fetch-products" class="product-grid">
            <?php
            $products = $proMana->fetchProducts();
            if ($products) {
                foreach ($products as $p) {
                    echo "<div class='product-card'>
                            <img src='{$p['image_url']}' alt='{$p['name']}'>
                            <h3>{$p['name']}</h3>
                            <p>Price: {$p['price']}$</p>
                            <form action='process_card.php' method='post'>
                                <input type='hidden' name='product_id' value='{$p['id']}'>
                                <input type='number' name='quantity' value='1' min='1'>
                                <input type='submit' value='Add to Cart'>
                            </form>
                        </div>";
                }
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
        </div>
        <div id="search-product">
          <form action="../../Backend/search_product.php" method="get">
            <input name="search" type="text" />
            <input type="submit" value="search" />
            <!-- php:
                            if submit then take the value from GET array,
                            and search this value at products database.
                    -->
          </form>
        </div>
      <!-- </section> -->
    </main>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
  </body>
  </html>
