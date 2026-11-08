 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once '../Includes/header.php'; 
    require_once '../Includes/config.php';
    require_once '../Includes/auth_check.php';
    ?>

    <main class="container">
        <div class="form-wrapper">
            <h2>Add New Student</h2>
            <form action="../Backend/add_student.php" method="POST">
                <div class="form-group">
                    <label>University ID:</label>
                    <input type="text" name="university_id" required>
                </div>
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="first_name" required>
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="last_name" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Mobile:</label>
                    <input type="text" name="mobile">
                </div>
                <div class="form-group">
                    <label>Level:</label>
                    <input type="text" name="level">
                </div>
                <div class="form-group">
                    <label>CGPA:</label>
                    <input type="number" step="0.01" name="cgpa" max="99">
                </div>
                <div class="form-group">
                    <label>Department:</label>
                    <select name="department_id" class="form-select">
                        <?php
                        $deps = $conn->query("SELECT * FROM departments");
                        while($dep = $deps->fetch_assoc()) {
                            echo "<option value='{$dep['department_id']}'>{$dep['department_name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn">Save Student</button>
            </form>
        </div>
    </main>

    <?php require_once '../Includes/footer.php'; ?>
    
</body>
</html>