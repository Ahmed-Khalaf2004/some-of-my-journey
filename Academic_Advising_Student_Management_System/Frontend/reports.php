 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>reports</title>
</head>
<body>
     <?php 
    require_once '../Includes/header.php'; 
    require_once '../Includes/config.php';
    ?>
    <main class="container">
        <div class="page-header">
            <h1>System Reports</h1>
        </div>

        <div class="report-section">
            <h3>Students Distribution by Department</h3>
            <table class="data-table">
                <thead><tr><th>Department</th><th>Total Students</th></tr></thead>
                <tbody>
                    <?php
                    $sql = "SELECT d.department_name, COUNT(s.student_id) as total 
                            FROM departments d 
                            LEFT JOIN students s ON d.department_id = s.department_id 
                            GROUP BY d.department_name";
                    $res = $conn->query($sql);
                    while($row = $res->fetch_assoc()) {
                        echo "<tr><td>{$row['department_name']}</td><td>{$row['total']}</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="report-section" style="margin-top: 40px;">
            <h3>Course Registration Count per Student</h3>
            <table class="data-table">
                <thead><tr><th>Student Name</th><th>Registered Courses</th></tr></thead>
                <tbody>
                    <?php
                    $sql = "SELECT s.first_name, s.last_name, COUNT(r.registration_id) as total_courses 
                            FROM students s 
                            JOIN registrations r ON s.student_id = r.student_id 
                            GROUP BY s.student_id";
                    $res = $conn->query($sql);
                    while($row = $res->fetch_assoc()) {
                        echo "<tr><td>{$row['first_name']} {$row['last_name']}</td><td>{$row['total_courses']}</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>