<?php require_once __DIR__ . '/../../includes/config.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/css/customer.css">
    <title>Login</title>
  </head>
  <body>
    <h1>Login</h1>   
    <?php require_once __DIR__ . '/../../includes/header.php'; ?>
    <main>
    <form action="../../Backend/login_process.php" method="post">
      <label for="email"></label>
      <input id="email" name="email" type="email" placeholder="Email" />
      <label for="password"></label>
      <input id="password" name="password" type="password" placeholder="Password" />
      <input type="submit" value="Login" />
      <!-- php:
                        if submit then take the values from POST array, and check:
                        if there is a user with this email and password in users database. if found then start session and start a session and store user_id, full_name, role. 
                            Redirect: if role = 'admin' → admin_dashboard.php; 
                                      else → index.html. .
                        else show error message.
                -->
    </form>
    </main>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
  </body>
</html>
