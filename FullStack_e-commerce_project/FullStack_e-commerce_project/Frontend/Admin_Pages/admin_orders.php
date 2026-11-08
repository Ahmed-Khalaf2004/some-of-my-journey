<?php
require_once "../../includes/config.php";
require_once "../../includes/auth.php"; 
require_once "../../Backend/admin_managment.php";

$adminMang = new AdminManagment($conn);
$orders = $adminMang->getAllOrders(); // سنحتاج لإنشاء هذه الدالة
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../assets/css/customer.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Admin Orders</title>
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
        <h1>Admin Orders</h1>
        <section>
            <h2>Existing Orders</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($orders as $o) {
                            echo "<tr>
                                    <td>{$o['order_id']}</td>
                                    <td>{$o['customer_name']}</td>
                                    <td>{$o['order_date']}</td>
                                    <td>\${$o['total_amount']}</td>
                                    <td>
                                        <form action='../../Backend/admin_order_process.php' method='POST'>
                                            <input type='hidden' name='order_id' value='{$o['order_id']}'>
                                            <select name='status' onchange='this.form.submit()'>
                                                <option value='pending' " . ($o['status'] == 'pending' ? 'selected' : '') . ">Pending</option>
                                                <option value='paid' " . ($o['status'] == 'paid' ? 'selected' : '') . ">Paid</option>
                                                <option value='shipped' " . ($o['status'] == 'shipped' ? 'selected' : '') . ">Shipped</option>
                                                <option value='delivered' " . ($o['status'] == 'delivered' ? 'selected' : '') . ">Delivered</option>
                                                <option value='cancelled' " . ($o['status'] == 'cancelled' ? 'selected' : '') . ">Cancelled</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td><a href='admin_order_details.php?order_id={$o['order_id']}'>View Details</a></td>
                                </tr>";
                        }
?>
                </tbody>
            </table>
        </section>
    </main>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>