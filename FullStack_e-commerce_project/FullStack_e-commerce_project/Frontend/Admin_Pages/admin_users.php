<?php
require_once "../../includes/config.php";
require_once "../../includes/auth.php"; 
require_once "../../Backend/admin_managment.php";

$adminMang = new AdminManagment($conn);
if (isset($_GET['delete_id'])) {
    $result = $adminMang->deleteUser(intval($_GET['delete_id']));
    $msg = ($result === "has_orders") ? "error=has_orders" : "status=deleted";
    header("Location: admin_users.php?$msg");
    exit();
}
$users = $adminMang->getAllUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/customer.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Admin Users</title>
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
        <h1>Admin Users</h1>
        <?php 
        if(isset($message)) echo $message;
        if(isset($_GET['status']) && $_GET['status'] == 'deleted') echo "<p style='color: green;'>User deleted successfully!</p>";
        ?>
        
        <section>
            <h2>Manage Users</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $u) { ?>
                    <tr>
                        <td><?php echo $u['id']; ?></td>
                        <td><?php echo htmlspecialchars($u['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($u['email']); ?></td>
                        <td>
                            <form action='../../Backend/admin_user_process.php' method='POST'>
                                <input type='hidden' name='user_id' value='<?php echo $u['id']; ?>'>
                                <select name='role' onchange='this.form.submit()'>
                                    <option value='customer' <?php if($u['role'] == 'customer') echo 'selected'; ?>>Customer</option>
                                    <option value='admin' <?php if($u['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href='admin_users.php?delete_id=<?php echo $u['id']; ?>' 
                               onclick='return confirm("Are you sure? This action cannot be undone.")'>Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>