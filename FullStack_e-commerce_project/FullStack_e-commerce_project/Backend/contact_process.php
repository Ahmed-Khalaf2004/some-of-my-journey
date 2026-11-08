<?php
require_once __DIR__ . '/../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/customer.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name    = htmlspecialchars(strip_tags($_POST['name']));
    $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(strip_tags($_POST['subject']));
    $message = htmlspecialchars(strip_tags($_POST['message']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        
        $sql = "INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {
            echo "<h1>Message Sent Successfully!</h1>";
            echo "<p>Thank you for contacting us, " . htmlspecialchars($name) . ".</p>";
            echo "<a href='../Frontend/Public_and_Customer_Pages/contact.php'>Go back to contact page</a>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required. Please go back and fill the form.";
    }
} else {
    header("Location: ../Frontend/Public_and_Customer_Pages/contact.php");
    exit();
}
?>