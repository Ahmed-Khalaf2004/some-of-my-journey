<?php
// Product management functions
class ProductManagement {
        private $conn;
        
    public function __construct($conn){
        $this->conn = $conn;
        }

    function fetchProducts(){
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $products = [];
            while($row = $result->fetch_assoc()){
                array_push($products, $row);
            }
            return $products;
        }
    }

    
    function filtering($categoryName){
        $sqlId = "SELECT id FROM categories WHERE name = ?";
        $stmt= $this->conn->prepare($sqlId);
        $stmt->bind_param("s", $categoryName);
        $stmt->execute();
        $resultId = $stmt->get_result();

        if($row = $resultId->fetch_assoc()){
            $catId = $row["id"];
            $sqlPro = "SELECT * from products WHERE category_id = ?";
            $stmtPro = $this->conn->prepare($sqlPro);
            $stmtPro->bind_param("i",$catId);
            $stmtPro->execute();
            $resultPro = $stmtPro->get_result();

            if($resultPro->num_rows > 0){
                return $resultPro->fetch_all(MYSQLI_ASSOC);
            }else{

                return [];
            }


        }else{
            return [];
        }

    }

    function sorting($value = null, $category = null) {
    $orderBy = ($value == 'price-asc') ? "price ASC" : (($value == 'price-desc') ? "price DESC" : "id ASC");
    
    $where = "";
    if ($category) {
        $where = "WHERE category_id = (SELECT id FROM categories WHERE name = ?)";
    }
    
    $sql = "SELECT * FROM products $where ORDER BY $orderBy";
    $stmt = $this->conn->prepare($sql);
    if ($category) {
        $stmt->bind_param("s", $category);
        }
        $stmt->execute();
        
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function fetchProduct($productID){
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i",$productID);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result && $result->num_rows > 0){
        return $result->fetch_assoc();
        } else {
            return null; 
        }

    }

  
        // if user_id logged in we call the fun, if not redirect to login
    public function addToCart($user_id, $product_id, $quantity) {
        // 1. تحقق من وجود المنتج في جدول card_items لهذا المستخدم
        $stmt = $this->conn->prepare("SELECT cart_id, quantity FROM cart_items WHERE user_id = ? AND product_id = ?");
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            // 2. إذا كان موجوداً، نحدث الكمية بجمع القديمة مع الجديدة
            $new_qty = $row['quantity'] + $quantity;
            $update = $this->conn->prepare("UPDATE cart_items SET quantity = ? WHERE cart_id = ?");
            $update->bind_param("ii", $new_qty, $row['cart_id']);
            $update->execute();
            return "The Product Quantity Updated Successfully!";
        } else {
            // 3. إذا لم يوجد، نُدخل سجل جديد بالكمية المطلوبة
            $insert = $this->conn->prepare("INSERT INTO cart_items (user_id, product_id, quantity) VALUES (?, ?, ?)");
            $insert->bind_param("iii", $user_id, $product_id, $quantity);
            $insert->execute();
            return "The Product Added To Cart Successfully!";
        }
    }


    // N+1 Query Problem:
    // function fetchCartProducts($userId){
    //     $sql = "SELECT product_id FROM cart_items WHERE user_id = ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bind_param("i", $userId);
    //     $stmt->execute();
    //     $result = $stmt->get_result();

    //     if($result->num_rows > 0){
    //         $products = [];
    //         while($row = $result->fetch_assoc()){
    //             $sqlPro = "SELECT * FROM products WHERE id = ?";
    //             $stmtPro = $this->conn->prepare($sqlPro);
    //             $stmtPro->bind_param("i", $row['id']);
    //             $stmtPro->execute();
    //             $resultPro = $stmtPro->get_result();

    //             while($rowPro = $resultPro->fetch_assoc()){
    //                 $products[] = $rowPro;
    //             }

    //         }
    //         return $products;
    //     }else{
    //         return "prob at fetch products id";
    //     }


    // }

    function fetchCartProducts($userId){
        $sql = "SELECT p.*, c.quantity 
                FROM cart_items c 
                JOIN products p ON c.product_id = p.id 
                WHERE c.user_id = ?";
                
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function updateCartQuantity($userId, $productId, $quantity) {
        $sql = "UPDATE cart_items SET quantity = ? WHERE user_id = ? AND product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $quantity, $userId, $productId);
        return $stmt->execute();
    }





}
        
        
        