<!-- Summary cards: total products (count from products), total orders, total users, unread contact 
messages (count where is_read = false).  -->
<?php
require_once "../../includes/config.php";
require_once "../../includes/auth.php"; 
require_once "../../Backend/admin_managment.php";

$adminMang = new AdminManagment($conn);
$total = $adminMang->total();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/customer.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <header>
        <nav class="admin-sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
                <li><a href="admin_products.php">Admin Products</a></li>
                <li><a href="admin_orders.php">Admin Orders</a></li>
                <li><a href="admin_users.php ">Admin users</a></li>
                <li><a href="admin_messages.php">Admin Messages</a></li>
                
            </ul>
        </nav>
    </header>
    <main class="admin-content">
        <h1>Admin Dashboard</h1>
    <section id="summary-cards">
        <h2>Totals:</h2>
        <p>Total Products: <?php echo htmlspecialchars($total['products']); ?></p>
        <p>Total Orders: <?php echo htmlspecialchars($total['orders']); ?></p>
        <p>Total Users: <?php echo htmlspecialchars($total['users']); ?></p>
        <p>Total Unread Messages: <?php echo htmlspecialchars($total['contacts']); ?></p>
    </section>

    </main>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>
