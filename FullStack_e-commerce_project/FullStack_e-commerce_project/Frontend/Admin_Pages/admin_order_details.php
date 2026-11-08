<?php
require_once "../../includes/config.php";
require_once "../../includes/auth.php"; 
require_once "../../Backend/admin_managment.php";

$adminMang = new AdminManagment($conn);
$order_id = intval($_GET['order_id']);
$items = $adminMang->getOrderDetails($order_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/customer.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="admin-sidebar">
            <ul>
            <h2>Admin Panel</h2>
            <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
                <li><a href="admin_products.php">Admin Products</a></li>
                <li><a href="admin_orders.php">Admin Orders</a></li>
                <li><a href="admin_users.php ">Admin users</a></li>
                <li><a href="admin_messages.php">Admin Messages</a></li>
            </ul>
        </nav>
    </header>
    <main class="admin-content">
    <h2>Order #<?php echo $order_id; ?> Details</h2>
    <table border="1">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item) {
            $subtotal = $item['quantity'] * $item['unit_price'];
            echo "<tr>
                    <td>{$item['product_name']}</td>
                    <td>{$item['quantity']}</td>
                    <td>\${$item['unit_price']}</td>
                    <td>\${$subtotal}</td>
                  </tr>";
        } ?>
    </tbody>
</table>
<a href="admin_orders.php">Back to Orders</a>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
    </main>
</body>
</html>