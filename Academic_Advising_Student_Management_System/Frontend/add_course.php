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
            <h2>Add New Course</h2>
            <form action="../Backend/add_course.php" method="POST">
                <div class="form-group">
                    <label>Course Name:</label>
                    <input type="text" name="course_name" required>
                </div>
                <div class="form-group">
                    <label>Course Code:</label>
                    <input type="text" name="course_code" required>
                </div>
                <div class="form-group">
                    <label>Credit Hours:</label>
                    <input type="number" name="credit_hours" required>
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
                <button type="submit" class="btn">Save Course</button>
            </form>
        </div>
    </main>
</body>
</html>