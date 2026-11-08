<?php 
require_once __DIR__ . '/../../includes/config.php'; 
require_once __DIR__ . '/../../Backend/product_managment.php';

$productsMan = new ProductManagement($conn);

$category = isset($_GET['category'])?  $_GET['category'] : null;
$sort = isset($_GET['category'])?  $_GET['category'] : "default";

$products =  $productsMan->sorting($sort, $category);
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
    <title>Products</title>
  </head>
  <body>
    <h1>Products</h1>
    <?php include __DIR__ . '/../../includes/header.php'; ?>
<main>
  <section>
    <div id="products-grid">
      <!--PHP: Product items will be displayed here from the database -->
      <!-- /CSS/: Product grid or flex layout -->
      <!-- Each product card includes “View Details” button (links to product-detail.html?id=...) and “Add to 
      Cart” button. 
      -->
      <?php
        if (!empty($products)) {
            foreach ($products as $product) {
              //dont forget product category
                echo <<<"heredoc"
                <div class='product-card'>
                    <img src='{$product['image_url']}' alt='{$product['name']}' />
                    <h2>{$product['name']}</h2>
                    <p>Price: {$product['price']}\$</p>
                    <form action="process_card.php" method="post">
                        <input type="hidden" name="product_id" value="{$product['id']}">
                        <input type="number" name="quantity" value="1" min="1">
                        <input type="submit" value="Add to Cart">
                    </form>
                    <a href="product-detail.php?productId={$product['id']}">Product Detailes</a>
                </div>
                heredoc;
            }
        } else {
            echo "<p>No products found in this category.</p>";
        }
    ?>
    </div>
  </section>

  <aside class="filter-sort">
    <div class="filtering">
      <figure>
        <img src="https://cdn-icons-png.flaticon.com/512/126/126510.png" alt="Filter Icon" />
        <!-- <img src="https://cdn-icons-png.flaticon.com/128/7094/7094575.png" alt="Filter Icon" />
        <img src="https://cdn-icons-png.flaticon.com/128/3126/3126528.png" alt="Filter Icon" /> -->
        <figcaption>Filter by Category</figcaption>
      </figure>
      <ul>
          <li><a href="products.php?category=Electronics">Electronics</a></li>
          <li><a href="products.php?category=Clothing">Clothing</a></li>
          <li><a href="products.php?category=Watches">Watches</a></li>
          <li><a href="products.php?category=Kitchen">Kitchen</a></li>
          <li><a href="products.php?category=Food">Food</a></li>
        <!--PHP: Categories will be dynamically generated from the database -->
      </ul>
    </div>
    <div class="Sorting">
      <figure>
        <img src="https://cdn.vectorstock.com/i/500p/38/04/sort-icon-with-arrow-and-horizontal-lines-design-vector-55613804.jpg" alt="Hero Image" id="hero-image" />
        <figcaption>Sort Products</figcaption>
      </figure>
      <form action="products.php" method="get">
        <select name="sort" onchange="this.form.submit()">
            <option value="default">Default</option>
            <option value="price-asc">Price: Low to High</option>
            <option value="price-desc">Price: High to Low</option>
        </select>
    </form>
    </div>
  </aside>
</main>

  <?php include __DIR__ . '/../../includes/footer.php'; ?>
  </body>
</html>