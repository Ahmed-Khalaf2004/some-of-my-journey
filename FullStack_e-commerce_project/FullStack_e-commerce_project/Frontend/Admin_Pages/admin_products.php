<?php
require_once "../../includes/config.php";
require_once "../../includes/auth.php"; 
require_once "../../Backend/admin_managment.php";

$adminMang = new AdminManagment($conn);

// في أعلى ملف admin_products.php
if (isset($_GET['delete_id'])) {
    $del_id = intval($_GET['delete_id']);
    $adminMang->deleteProduct($del_id);
    // إعادة توجيه لنفس الصفحة للتخلص من الـ GET parameter
    header("Location: admin_products.php?status=deleted");
    exit();
}

// في أعلى الملف بجانب كود النجاح السابق
if(isset($_GET['status']) && $_GET['status'] == 'deleted'){
    echo "<p style='color: red;'>Product deleted successfully!</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/customer.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Admin Products</title>
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
        <h1>Admin Products</h1>
        <?php 
        if(isset($_GET['status']) && $_GET['status'] == 'success'){
            echo "<p style='color: green;'>Product added successfully!</p>";
            } ?>
        <!-- <section> -->
        <h2>Existing Products</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $products = $adminMang->getProducts();
                    foreach ($products as $p) {
                        echo "<tr>
                                <td>{$p['id']}</td>
                                <td>{$p['name']}</td>
                                <td>{$p['price']}</td>
                                <td>{$p['stock_quantity']}</td>
                                <td>{$p['category_name']}</td>
                                <td><a href='admin_edit_product.php?id={$p['id']}'>Edit</a> |
                                    <a href='admin_products.php?delete_id={$p['id']}' onclick=\"return confirm('Are you sure?');\">Delete</a>
                                </td>
                                </tr>";
                    }
                    ?>
            </tbody>
        </table>
    <!-- </section> -->
        <h2>Add New Product</h2>
        <form action="../../Backend/admin_product_process.php" method="POST">
            <input type="text" name="name" placeholder="Product Name" required>
            <textarea name="description" placeholder="Description"></textarea>
            <input type="number" name="price" step="0.01" placeholder="Price" required>
            <input type="number" name="stock_quantity" placeholder="Stock Quantity" required>
            <input type="url" name="image_url" placeholder="Image URL">
            
            <select name="category_id" required>
               <?php 
                    $categories = $adminMang->getCategories();
                    if ($categories) {
                        foreach ($categories as $cat) {
                            // تأكد أن $cat تحتوي على المفاتيح 'id' و 'name'
                                echo "<option value='{$cat['id']}'>{$cat['name']}</option>";
                            }
                        } else {
                            echo "<option value=''>No categories found</option>";
                        }
                        ?>
            </select>
            
            <button type="submit" name="add_product">Add Product</button>
        </form>
    <!-- </section> -->
    </main>
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>