 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <?php require_once '../Includes/header.php'; ?>

    <main class="container">
        <div class="login-container">
            <h2>Login to System</h2>
            <form action="../Backend/auth_process.php" method="POST">
                <div class="form-group">
                    <label for="email">University Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </main>

    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>