 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>courses</title>
</head>
<body>
    <?php 
    require_once '../Includes/header.php'; 
    require_once '../Includes/config.php';
    ?>

    <main class="container">
        <div class="page-header">
            <h1>Courses</h1>
            <a href="add_course.php" class="btn-add">+ Add New Course</a>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Course Name</th>
                    <th>Credits</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT courses.*, departments.department_name 
                        FROM courses 
                        JOIN departments ON courses.department_id = departments.department_id";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['course_code']}</td>
                        <td>{$row['course_name']}</td>
                        <td>{$row['credit_hours']}</td>
                        <td>{$row['department_name']}</td>
                        <td>
                            <a href='edit_course.php?id={$row['course_id']}' class='btn-edit'>Edit</a>
                            <a href='../Backend/delete_course.php?id={$row['course_id']}' class='btn-del' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>