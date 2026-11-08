<link rel="stylesheet" href="../../assets/css/global.css">
<header>
  <nav>
    <ul id="nav-links">
      <a href="index.php">Home</a>
      <a href="products.php">Products</a>
      <a href="cart.php">Cart</a>
      <a href="contact.php">Contact</a>
      <!--php: 
                    case "a": if logged in then link to profile.
                    case "b": else not link to sign up.
              -->
      <?php
      if (isset($_SESSION['user_id'])) {
          echo '<a href="profile.php">Profile</a>';
      } else {
          echo '<a href="login.php">Log in</a>';
          echo '<a href="register.php">Sign Up</a>';
      }
      ?>
    </ul>
  </nav>
    </header>