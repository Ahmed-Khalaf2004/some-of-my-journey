<?php
require_once "../../includes/config.php";
require_once "../../includes/auth.php";
require_once "../../Backend/admin_managment.php";

$adminMang = new AdminManagment($conn);

// معالجة الإجراءات (قراءة أو حذف)
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($_GET['action'] == 'read') {
        $adminMang->markMessageAsRead($id);
    } elseif ($_GET['action'] == 'delete') {
        $adminMang->deleteMessage($id);
    }
    header("Location: admin_messages.php");
    exit();
}

$messages = $adminMang->getAllMessages();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Messages</title>
    <link rel="stylesheet" href="../../assets/css/customer.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
    <header>
        <nav class="admin-sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
                <li><a href="admin_products.php">Admin Products</a></li>
                <li><a href="admin_orders.php">Admin Orders</a></li>
                <li><a href="admin_users.php">Admin Users</a></li>
                <li><a href="admin_messages.php">Admin Messages</a></li>
            </ul>
        </nav>
    </header>
    
    <main class="admin-content">
        <h1>Admin Messages</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($messages as $m) { ?>
                <tr style="<?php echo $m['is_read'] ? '' : 'font-weight: bold; background-color: #f9f9f9;'; ?>">
                    <td><?php echo htmlspecialchars($m['name']); ?></td>
                    <td><?php echo htmlspecialchars($m['email']); ?></td>
                    <td><?php echo htmlspecialchars($m['subject']); ?></td>
                    <td><?php echo htmlspecialchars($m['message']); ?></td>
                    <td><?php echo $m['submitted_at']; ?></td>
                    <td><?php echo $m['is_read'] ? 'Read' : 'Unread'; ?></td>
                    <td>
                        <?php if (!$m['is_read']) { ?>
                            <a href='admin_messages.php?action=read&id=<?php echo $m['message_id']; ?>'>Mark Read</a> |
                        <?php } ?>
                        <a href='admin_messages.php?action=delete&id=<?php echo $m['message_id']; ?>' 
                           onclick='return confirm("Delete this message?")'>Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>