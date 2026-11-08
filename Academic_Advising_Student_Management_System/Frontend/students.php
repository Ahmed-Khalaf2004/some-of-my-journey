 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>students</title>
</head>
<body>
    <?php 
    require_once '../Includes/header.php'; 
    require_once '../Includes/config.php';
    require_once '../Includes/auth_check.php';
    ?>
    <main class="container">
    <div class="page-header">
        <h1>Students Management</h1>
        <a href="add_student.php" class="btn-add">+ Add New Student</a>
    </div>

    <form method="GET" action="students.php" style="margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Search by email...">
        <button type="submit" class="btn">Search</button>
    </form>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $sql = "SELECT students.*, departments.department_name FROM students 
                    LEFT JOIN departments ON students.department_id = departments.department_id";
            
            if ($search != '') {
                $sql .= " WHERE first_name LIKE '%$search%' OR email LIKE '%$search%'";
            }
            
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['student_id']}</td>
                    <td>{$row['first_name']} {$row['last_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['department_name']}</td>
                    <td>
                        <a href='edit_student.php?id={$row['student_id']}' class='btn-edit'>Edit</a>
                        <a href='../Backend/delete_student.php?id={$row['student_id']}' class='btn-del' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</main>
</body>
</html>