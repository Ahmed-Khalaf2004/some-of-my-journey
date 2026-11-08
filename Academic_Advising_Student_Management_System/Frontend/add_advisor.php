 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<?php
require_once '../Includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Add Advisor</title>
</head>
<body>
   <?php 
    require_once '../Includes/header.php'; 
    require_once '../Includes/auth_check.php';
    ?>

    <main class="container">
        <div class="form-wrapper">
            <h2>Add New Advisor</h2>
            
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 'duplicate_email') {
                echo "<p style='color: red; text-align: center; font-weight: bold;'>Error: This email is already registered!</p>";
            }
            ?>

            <form action="../Backend/add_advisor.php" method="POST">
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="first_name" required>
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="last_name" required>
                </div>
                
                <div class="form-group">
                    <label>Department:</label>
                    <select name="department_id" required class="form-select">
                        <?php
                        $deps = $conn->query("SELECT * FROM departments");
                        while($dep = $deps->fetch_assoc()) {
                            echo "<option value='{$dep['department_id']}'>{$dep['department_name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>University Email:</label>
                    <input type="email" name="university_email" required>
                </div>

                <div class="form-group">
                    <label>Office Number:</label>
                    <input type="text" name="office_number" required>
                </div>

                <div class="form-group">
                    <label>Phone Number:</label>
                    <input type="text" name="phone_number" required>
                </div>
                
                <button type="submit" class="btn">Save Advisor</button>
            </form>
        </div>
    </main>

    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>