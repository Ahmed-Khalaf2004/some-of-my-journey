<?php
class UserManagement {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function emailExists($email) {
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function register($full_name, $email, $password, $phone, $address) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (full_name, email, password, phone, address, role) VALUES (?, ?, ?, ?, ?, 'customer')";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssss", $full_name, $email, $hashedPassword, $phone, $address);
        
        return $stmt->execute();
    }

//     public function login($email, $password) {
//     $sql = "SELECT id, full_name, password, role FROM users WHERE email = ?";
//     $stmt = $this->conn->prepare($sql);
//     $stmt->bind_param("s", $email);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows === 1) {
//         $user = $result->fetch_assoc();
        
//         if (password_verify($password, $user['password'])) {
//             return $user;
//         }
//     }
    
//     return false;
// }

    public function login($email, $password) {
        // 1. استخدام $this-> لاستدعاء الدالة الخاصة بالكلاس
        if (!$this->emailExists($email)) {
            return "email_not_found"; 
        }

        // 2. استخدام $this->conn للاتصال بقاعدة البيانات
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user["password"])) {
                // تخزين البيانات في الجلسة (يفضل فعل ذلك في ملف المعالجة وليس داخل الكلاس)
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["full_name"] = $user["full_name"];
                $_SESSION["role"] = $user["role"];
                return $user; // نجاح
            } else {
                return "invalid_password";
            }
        }
        return false;
    }

   public function getUserById($user_id) {
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
    }

    // تحديث ملف المستخدم
    public function updateProfile($user_id, $full_name, $phone, $address) {
        $sql = "UPDATE users SET full_name = ?, phone = ?, address = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $full_name, $phone, $address, $user_id);
        return $stmt->execute();
    }

    // جلب طلبات المستخدم
    public function getUserOrders($user_id) {
        $sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderItems($order_id) {
    $sql = "SELECT oi.*, p.name as product_name 
            FROM order_items oi
            JOIN products p ON oi.product_id = p.id
            WHERE oi.order_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    
}

?>