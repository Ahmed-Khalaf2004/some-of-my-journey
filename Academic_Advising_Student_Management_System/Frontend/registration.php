 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>registration</title>
</head>
<body>
    <?php 
    require_once '../Includes/header.php'; 
    require_once '../Includes/config.php';
    require_once '../Includes/auth_check.php';
    ?>
    <main class="container">
        <div class="form-wrapper">
            <h2>Student Course Registration</h2>
            <form action="../Backend/add_registration.php" method="POST">
                
                <div class="form-group">
                    <label>Student:</label>
                    <select name="student_id" class="form-select" required>
                        <?php
                        $res = $conn->query("SELECT student_id, first_name, last_name FROM students");
                        while($row = $res->fetch_assoc()) {
                            echo "<option value='{$row['student_id']}'>{$row['first_name']} {$row['last_name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Course:</label>
                    <select name="course_id" class="form-select" required>
                        <?php
                        $res = $conn->query("SELECT course_id, course_name FROM courses");
                        while($row = $res->fetch_assoc()) {
                            echo "<option value='{$row['course_id']}'>{$row['course_name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Semester:</label>
                    <input type="text" name="semester" placeholder="e.g. Fall 2026" required>
                </div>
                <div class="form-group">
                    <label>Academic Year:</label>
                    <input type="text" name="academic_year" placeholder="e.g. 2026-2027" required>
                </div>
                
                <button type="submit" class="btn">Register Course</button>
            </form>
        </div>
    </main>
</body>
</html>