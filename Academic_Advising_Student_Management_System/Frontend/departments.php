 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<?php
require_once __DIR__ ."/../Includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>departments</title>
</head>
<body>
    <?php 
    require_once '../Includes/header.php'; 
    ?>

    <main class="container">
        <div class="page-header">
            <h1>Academic Departments</h1>
            <a href="add_department.php" class="btn-add">+ Add New Department</a>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Office Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
           <tbody>
            <?php
            // جلب البيانات من قاعدة البيانات
            $result = $conn->query("SELECT * FROM departments");
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['department_id'] . "</td>";
                echo "<td>" . $row['department_name'] . "</td>";
                echo "<td>" . $row['department_code'] . "</td>";
                echo "<td>
                        <a href='edit_department.php?id=" . $row['department_id'] . "' class='btn-edit'>Edit</a>
                        <a href='../Backend/delete_department.php?id=" . $row['department_id'] . "' class='btn-del' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
        </table>
    </main>

    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>