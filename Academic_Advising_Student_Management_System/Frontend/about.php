
  <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>about</title>
</head>
<body>
     <?php 
    require_once '../Includes/header.php'; 
    require_once '../Includes/config.php';
    ?>

    <main class="container">
        <div class="about-card" style="text-align: center; padding: 50px 20px;">
            <h1>About Academic Advising System</h1>
            <p style="font-size: 1.2rem; color: #555; max-width: 800px; margin: 20px auto;">
                This system is designed to make the academic advising process more simple, 
                making better communication between students and advisors, 
                tracking academic progress, and managing course registrations efficiently.
            </p>

            <div class="system-info" style="margin-top: 40px; border-top: 1px solid #eee; padding-top: 20px;">
                <p>Developed by</p>
                <h3><strong>Eng. Ahmed Khalaf</strong></h3>
                <p>Date: June 2026</p>
            </div>

            <div class="features" style="margin-top: 30px;">
                <h4>Core Features:</h4>
                <ul style="list-style: none; padding: 0;">
                    <li>✅ Student Management & Tracking</li>
                    <li>✅ Course & Department Coordination</li>
                    <li>✅ Advising Session Scheduling</li>
                    <li>✅ Comprehensive Reporting</li>
                </ul>
            </div>
        </div>
    </main>

    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>