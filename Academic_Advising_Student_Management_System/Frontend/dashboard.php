 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <?php require_once '../Includes/header.php'; ?>

    <main class="container">
        <h1>Welcome, Dashboard</h1>
        <p>Manage your academic activities and view system reports.</p>

        <div class="dashboard-grid">
            <a href="departments.php" class="dash-card">Departments</a>
            <a href="advisors.php" class="dash-card">Advisors</a>
            <a href="students.php" class="dash-card">Students</a>
            <a href="courses.php" class="dash-card">Courses</a>
            <a href="registration.php" class="dash-card">Registration</a>
            <a href="advising_sessions.php" class="dash-card">Advising Sessions</a>
        </div>
    </main>

    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>