 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Edit</title>
</head>
<body>
    <?php 
    require_once '../Includes/header.php'; 
    require_once '../Includes/config.php';
    require_once '../Includes/auth_check.php';

    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM departments WHERE department_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    ?>

    <main class="container">
        <h2>Edit Department</h2>
        <div class="form-wrapper">
            <form action="../Backend/update_department.php" method="POST">
                <input type="hidden" name="department_id" value="<?php echo $row['department_id']; ?>">
                
                <div class="form-group">
                    <label>Department Name:</label>
                    <input type="text" name="department_name" value="<?php echo $row['department_name']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Department Code:</label>
                    <input type="text" name="department_code" value="<?php echo $row['department_code']; ?>" required>
                </div>
                
                <button type="submit" class="btn">Update Department</button>
            </form>
        </div>
    </main>

    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>