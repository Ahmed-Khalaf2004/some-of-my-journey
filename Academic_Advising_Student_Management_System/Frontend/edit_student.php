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
    $stmt = $conn->prepare("SELECT * FROM students WHERE student_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    ?>

    <main class="container">
        <div class="form-wrapper">
            <h2>Edit Student</h2>
            <form action="../Backend/update_student.php" method="POST">
                <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">
                
                <div class="form-group">
                    <label>University ID:</label>
                    <input type="text" name="university_id" value="<?php echo $row['university_id']; ?>" required>
                </div>
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required>
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
                <button type="submit" class="btn">Update Student</button>
            </form>
        </div>
    </main>
    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>