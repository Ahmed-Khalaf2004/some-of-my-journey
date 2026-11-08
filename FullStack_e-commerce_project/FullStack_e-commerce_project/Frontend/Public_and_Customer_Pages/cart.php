<?php 
require_once __DIR__ . '/../../includes/config.php'; 
require_once __DIR__ . '/../../Backend/product_managment.php';

if(!isset($_SESSION['user_id'])){
  header("Location: login.php");
  exit();
}
  
$cartMang = new ProductManagement($conn);
$cartPros = $cartMang->fetchCartProducts($_SESSION['user_id']);

$taxRate = 0.05;


?>
<!-- (fetched from cart_items joined with products). -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/css/customer.css">
    <title>Cart Items</title>
  </head>
  <body>
      <h1>Cart Items</h1>   
      <?php include __DIR__ . '/../../includes/header.php'; ?>
    <main>
      <section class="cart-items">
        <!--PHP: Fetch cart items from the database(cart_items joined with products) for the logged-in user -->
        <!-- JS: Fetch cart items from the localStorage for guest users -->
        <!-- Display each cart item with product name, price, quantity, and total price -->
        <!-- Include “Remove” button for each item to allow users to remove items from the cart -->
        <?php

        ?>
        <table>
          <thead>
            <tr>
              <!-- • Show: product image, name, unit price, quantity (editable), subtotal, remove button.  -->
              <th>Product Image</th>
              <!-- static -->
              <th>Product Name</th>
              <!-- static -->
              <th>Unit Price</th>
              <!-- static -->
              <th>Quantity</th>
              <!-- changeable -->
              <th>Subtotal</th>
              <!-- calculated as unit price * quantity -->
              <th>Remove Product</th>
            </tr>
          </thead>
          <tbody class="cart-items-body">
            <!--PHP/JS: Cart items will be dynamically generated here -->
            <!-- User can update quantity and remove items: "note: 
            1. quantity will be input field.
            2. when updating quantity, the subtotal will be recalculated" 
            -->
            <?php
            $userId = $_SESSION['user_id'];
              $totalProductsPrice = 0;
              foreach ($cartPros as $pro) {
                $subtotal = $pro['price'] * $pro['quantity'];
                $totalProductsPrice = $subtotal + $totalProductsPrice;
                echo<<<"product"
                <tr>
                  <td><a href="{$pro['image_url']}"></a></td>
                  <td><h3>{$pro['name']}</h3></td>
                  <td><h3>{$pro['price']}</h3></td>
                  <td>
                  <input type="number" name="quantity[{$pro['id']}]" value="{$pro['quantity']}" min="1" onchange="updateSubtotal(this, {$pro['price']}, {$pro['id']})">
                  </td>
                  <td id="subtotal-{$pro['id']}">{$subtotal} $</td>
                  <td><a href="../../Backend/remove_from_cart.php?id={$pro['id']}">Remove</a></td>
                </tr>
                product;
                
              }
            ?>
          </tbody>
        </table>
      </section>
      <section class="cart-summary">
            <?php 
            $tax = $totalProductsPrice * $taxRate;
            $total = $totalProductsPrice + $tax;
            ?>
            <div class="summary">
              <form action="../../Backend/cheakout.php" method="POST" id="cart-form">
                <p class="subtotal-display">Subtotal: <?php echo number_format($totalProductsPrice, 2); ?> $</p>
                <p class="tax-display">Tax (5%): <?php echo number_format($tax, 2); ?> $</p>
                <p class="total-display">Total: <?php echo number_format($total, 2); ?> $</p>
                <button type="submit" name="proceed_to_checkout">Proceed to Checkout</button>              
              </form>
            </div>
        </section>
    </main>
    <script>
function updateSubtotal(input, price, productId) {
    let quantity = input.value;
    let subtotal = (quantity * price).toFixed(2);
    
    document.getElementById('subtotal-' + productId).innerText = subtotal + ' $';
    
    calculateTotal();
}

function calculateTotal() {
        const TAX_RATE = 0.05;
        let subtotals = document.querySelectorAll('[id^="subtotal-"]');
        let total = 0;
        subtotals.forEach(function(item) {
            let value = parseFloat(item.innerText.replace(' $', ''));
            if (!isNaN(value)) total += value;
        });
        let tax = total * TAX_RATE;
        let grandTotal = total + tax;
        
        document.getElementById('subtotal-display').innerText = 'Subtotal: ' + total.toFixed(2) + ' $';
        document.getElementById('tax-display').innerText = 'Tax (5%): ' + tax.toFixed(2) + ' $';
        document.getElementById('total-display').innerText = 'Total: ' + grandTotal.toFixed(2) + ' $';
    }
</script>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
  </body>
</html>
