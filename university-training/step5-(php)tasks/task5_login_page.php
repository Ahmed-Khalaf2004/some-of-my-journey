<?php
session_start();
$username = "Ahmed";
$password = "test2026";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if ($name === $username && $pass === $password) {
        $_SESSION['user'] = $username;
        echo "<h3>success login! " . htmlspecialchars($username) . "</h3>";
        exit;
    } else {
        $error = "invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>login page</title>
</head>
<body>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <div>
            <label>username:</label><br>
            <input type="text" name="username" required>
        </div>
        <br>
        <div>
            <label>password:</label><br>
            <input type="password" name="password" required>
        </div>
        <br>
        <button type="submit">login</button>
    </form>
</body>
</html>