 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Add Department</title>
</head>
<body>
    <?php require_once '../Includes/header.php'; 
    require_once '../Includes/auth_check.php';
    
    ?>

    <main class="container">
        <h2>Add New Department</h2>
        <div class="form-wrapper">
            <form action="../Backend/add_department.php" method="POST">
                <div class="form-group">
                    <label>Department Name:</label>
                    <input type="text" name="department_name" required>
                </div>
                
                <div class="form-group">
                    <label>Department Code:</label>
                    <input type="text" name="department_code" required>
                </div>
                
                <button type="submit" class="btn">Save Department</button>
            </form>
        </div>
    </main>

    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>