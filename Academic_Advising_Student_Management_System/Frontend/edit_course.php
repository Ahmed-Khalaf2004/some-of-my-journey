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

    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM courses WHERE course_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    ?>

    <main class="container">
        <div class="form-wrapper">
            <h2>Edit Course</h2>
            <form action="../Backend/update_course.php" method="POST">
                <input type="hidden" name="course_id" value="<?php echo $row['course_id']; ?>">
                
                <div class="form-group">
                    <label>Course Name:</label>
                    <input type="text" name="course_name" value="<?php echo $row['course_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Course Code:</label>
                    <input type="text" name="course_code" value="<?php echo $row['course_code']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Credit Hours:</label>
                    <input type="number" name="credit_hours" value="<?php echo $row['credit_hours']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Department:</label>
                    <select name="department_id" class="form-select">
                        <?php
                        $deps = $conn->query("SELECT * FROM departments");
                        while($dep = $deps->fetch_assoc()) {
                            $selected = ($dep['department_id'] == $row['department_id']) ? 'selected' : '';
                            echo "<option value='{$dep['department_id']}' $selected>{$dep['department_name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn">Update Course</button>
            </form>
        </div>
    </main>
    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>