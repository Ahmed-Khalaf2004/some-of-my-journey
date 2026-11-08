 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Advisors</title>
</head>
<body>
    <?php 
    require_once '../Includes/header.php'; 
    require_once '../Includes/config.php';
    ?>

    <main class="container">
        <div class="page-header">
            <h1>Academic Advisors</h1>
            <a href="add_advisor.php" class="btn-add">+ Add New Advisor</a>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $result = $conn->query("SELECT advisors.advisor_id, advisors.first_name, advisors.last_name, 
                                        advisors.university_email, departments.department_name 
                                    FROM advisors 
                                    JOIN departments ON advisors.department_id = departments.department_id");

            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['advisor_id']}</td>
                    <td>{$row['first_name']} {$row['last_name']}</td>
                    <td>{$row['department_name']}</td>
                    <td>{$row['university_email']}</td>
                    <td>
                        <a href='edit_advisor.php?id={$row['advisor_id']}' class='btn-edit'>Edit</a>
                        <a href='../Backend/delete_advisor.php?id={$row['advisor_id']}' class='btn-del' onclick='return confirm(\"Are you sure?\")'>Delete</a>
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