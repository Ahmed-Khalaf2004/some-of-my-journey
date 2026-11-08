<?php
require_once "../../includes/config.php";
require_once "../../includes/auth.php"; 
require_once "../../Backend/admin_managment.php";

$adminMang = new AdminManagment($conn);

if (!isset($_GET['id'])) {
    header("Location: admin_products.php");
    exit();
}

$product_id = intval($_GET['id']);
$product = $adminMang->getProductById($product_id);

if (!$product) {
    echo "Product not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../assets/css/customer.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Edit Product</title>
</head>
<body>
    <header>
        <nav class="admin-sidebar">
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
    <h1>Edit Product: <?php echo htmlspecialchars($product['name']); ?></h1>
    <form action="../../Backend/admin_edit_product_process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        <textarea name="description"><?php echo htmlspecialchars($product['description']); ?></textarea>
        <input type="number" name="price" step="0.01" value="<?php echo $product['price']; ?>" required>
        <input type="number" name="stock_quantity" value="<?php echo $product['stock_quantity']; ?>" required>
        <input type="url" name="image_url" value="<?php echo htmlspecialchars($product['image_url']); ?>">
        
        <select name="category_id" required>
            <?php 
            $categories = $adminMang->getCategories();
            foreach ($categories as $cat) {
                $selected = ($cat['id'] == $product['category_id']) ? 'selected' : '';
                echo "<option value='{$cat['id']}' $selected>{$cat['name']}</option>";
            }
            ?>
        </select>
        
        <button type="submit" name="edit_product">Update Product</button>
    </form>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
    </main>
</body>
</html>