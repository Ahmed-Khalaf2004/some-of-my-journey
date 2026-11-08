<!-- • Accessible only to logged-in customers. 
 -->
<?php
require_once "../../includes/config.php";
require_once "../../Backend/user_managment.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userMang = new UserManagement($conn);
$user = $userMang->getUserById($_SESSION['user_id']);
$orders = $userMang->getUserOrders($_SESSION['user_id']);

// معالجة تحديث البيانات
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_profile'])) {
    $userMang->updateProfile($_SESSION['user_id'], $_POST['full_name'], $_POST['phone'], $_POST['address']);
    header("Location: profile.php?status=updated");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/customer.css">
    <title>Profile</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($user['full_name']); ?></h1>
    <?php include __DIR__ . '/../../includes/header.php'; ?>
    <a href="../../Backend/logout.php" class="view-products-btn-login-logout">Logout</a>
    <main>
        <section id="edit-info">
            <h2>Edit Information</h2>
            <form method="POST">
                <input type="text" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
                <textarea name="address"><?php echo htmlspecialchars($user['address']); ?></textarea>
                <button type="submit" name="update_profile">Update</button>
            </form>
        </section>
        <section id="order-history">
        <h2>Order History</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php foreach ($orders as $o) { ?>
            <tr>
                <td><?php echo $o['order_id']; ?></td>
                <td><?php echo $o['order_date']; ?></td>
                <td><?php echo $o['total_amount']; ?></td>
                <td><?php echo $o['status']; ?></td>
                <td><a href="order_details.php?id=<?php echo $o['order_id']; ?>">View Details</a></td>
            </tr>
            <?php } ?>
        </table>
    </section>
        
    </main>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
  </body>
</html>