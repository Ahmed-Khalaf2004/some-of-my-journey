 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Home</title>
</head>
<body>
    <?php
     require_once '../Includes/header.php';
     ?>

    <main class="container">
        <section class="hero">
            <h1>Welcome to the Academic Advising System</h1>
            <p>Your portal for managing academic progress, appointments, and advisor communications.</p>
        </section>

        <section class="quick-links">
            <div class="card">
                <h3>View Departments</h3>
                <p>Explore all available academic departments.</p>
                <a href="departments.php" class="btn">Go to Departments</a>
            </div>
            <div class="card">
                <h3>My Dashboard</h3>
                <p>Access your personal academic overview.</p>
                <a href="dashboard.php" class="btn">View Dashboard</a>
            </div>
        </section>
    </main>

    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>