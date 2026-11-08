<?php
class AdminManagment{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
 
    }

    public function total() {
        $totals = [];
        
        // استخدام دالة COUNT(*) مباشرة للعد
        $totals['products'] = $this->getCount("products");
        $totals['orders']   = $this->getCount("orders");
        $totals['users']    = $this->getCount("users");
        
        // جلب الرسائل غير المقروءة فقط
        $sql = "SELECT COUNT(*) as count FROM contacts WHERE is_read = 0";
        $result = $this->conn->query($sql);
        $totals['contacts'] = $result->fetch_assoc()['count'];

        return $totals;
    }

    private function getCount($table) {
        $sql = "SELECT COUNT(*) as count FROM $table";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['count'];
    }

    public function getCategories() {
        $sql = "SELECT id, name FROM categories";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProducts() {
        $sql = "SELECT p.id, p.name, p.price, p.stock_quantity, c.name as category_name 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // الكود الصحيح:
    public function addProduct($name, $description, $price, $stock_quantity, $image_url, $category_id) {
        $sql = "INSERT INTO products (name, description, price, stock_quantity, image_url, category_id) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($sql);
        // s = string, d = double (للسعر)، i = integer (للمخزون والفئة)
        $stmt->bind_param("ssdiss", $name, $description, $price, $stock_quantity, $image_url, $category_id);
        
        return $stmt->execute();
    }

    // داخل الكلاس
    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function editProduct($id, $name, $description, $price, $stock, $image_url, $category_id) {
    $sql = "UPDATE products SET name=?, description=?, price=?, stock_quantity=?, image_url=?, category_id=? WHERE id=?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssdisii", $name, $description, $price, $stock, $image_url, $category_id, $id);
    return $stmt->execute();
    }

    public function deleteProduct($id) {
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
    }

    public function getAllOrders() {
    $sql = "SELECT o.id, u.full_name as customer_name, o.order_date, o.total_amount, o.status 
            FROM orders o 
            JOIN users u ON o.user_id = u.id 
            ORDER BY o.order_date DESC";
    $result = $this->conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateOrderStatus($order_id, $status) {
    // نستخدم order_id كما في جدولك
    $sql = "UPDATE orders SET status = ? WHERE order_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("si", $status, $order_id);
    return $stmt->execute();
    }

    public function getOrderDetails($order_id) {
    $sql = "SELECT oi.*, p.name as product_name 
            FROM order_items oi
            JOIN products p ON oi.product_id = p.id
            WHERE oi.order_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    }

    // جلب جميع المستخدمين
    public function getAllUsers() {
        $sql = "SELECT id, full_name, email, role FROM users ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // تحديث دور المستخدم
    public function updateUserRole($user_id, $role) {
        $sql = "UPDATE users SET role = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $role, $user_id);
        return $stmt->execute();
    }

    // حذف المستخدم مع التحقق من الطلبات
    public function deleteUser($user_id) {
        // 1. التحقق من وجود طلبات للمستخدم
        $check_sql = "SELECT COUNT(*) as count FROM orders WHERE user_id = ?";
        $stmt = $this->conn->prepare($check_sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result['count'] > 0) {
            return "has_orders"; // لا يمكن الحذف
        }

        // 2. الحذف إذا لم توجد طلبات
        $del_sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($del_sql);
        $stmt->bind_param("i", $user_id);
        return $stmt->execute() ? true : false;
    }

    public function getAllMessages() {
        $sql = "SELECT * FROM contacts ORDER BY submitted_at DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // تمييز الرسالة كمقروءة
    public function markMessageAsRead($message_id) {
        $sql = "UPDATE contacts SET is_read = TRUE WHERE message_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $message_id);
        return $stmt->execute();
    }

    // حذف رسالة
    public function deleteMessage($message_id) {
        $sql = "DELETE FROM contacts WHERE message_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $message_id);
        return $stmt->execute();
    }


}


?>