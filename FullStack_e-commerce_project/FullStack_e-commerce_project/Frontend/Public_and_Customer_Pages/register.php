<?php require_once __DIR__ . '/../../includes/config.php'; ?>
<!-- • Form: full name, email, password, confirm password, phone, address. 
 -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/css/customer.css">
    <title>Register</title>
  </head>
  <body>
    <h1>Register</h1>   
    <?php include __DIR__ . '/../../includes/header.php'; ?>
    <main>
      <section>
        <h2>Already Have Account?</h2>
        <a href="login.php"  class="view-products-btn-login-logout">Click To Login</a>
      </section>
      <form action="../../Backend/register_process.php" method="post">
        <label for="full_name">Full Name:</label>
        <input id="full_name" name="full_name" type="text" placeholder="Full Name" required/>
        <label for="email">Email:</label>
        <input id="email" name="email" type="email" placeholder="Email" required/>
        <label for="password">Password:</label>
        <input id="password" name="password" type="password" placeholder="Password" required/>
        <label for="confirm_password">Confirm Password:</label>
        <input
          id="confirm_password"
          name="confirm_password"
          type="password"
          placeholder="Confirm Password"
          required
        />
        <label for="phone">Phone:</label>
        <input id="phone" name="phone" type="tel" placeholder="Phone" required/>
        <label for="address">Address:</label>
        <input id="address" name="address" type="text" placeholder="Address" required/>
        <input type="submit" value="Register" />
        <!-- On submit, send to register_process.php. Check if email already exists. If not, hash password and insert new 
            user with role = 'customer'. Redirect to login.html. -->
      </form>
    </main>
  <?php include __DIR__ . '/../../includes/footer.php'; ?>
  </body>
</html>
