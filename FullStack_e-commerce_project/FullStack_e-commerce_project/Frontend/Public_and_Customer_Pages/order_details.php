<?php
require_once "../../includes/config.php";
require_once "../../Backend/user_managment.php";

if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
    header("Location: profile.php");
    exit();
}

$userMang = new UserManagement($conn);
$items = $userMang->getOrderItems($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Details</title>
    <link rel="stylesheet" href="../../assets/css/customer.css">
</head>
<body>
    <h1>Order #<?php echo htmlspecialchars($_GET['id']); ?> Details</h1>
    <a href="profile.php">Back to Profile</a>
    
    <table border="1">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) { ?>
            <tr>
                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td>$<?php echo number_format($item['unit_price'], 2); ?></td>
                <td>$<?php echo number_format($item['quantity'] * $item['unit_price'], 2); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>