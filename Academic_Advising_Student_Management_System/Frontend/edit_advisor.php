 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<?php 
require_once '../Includes/header.php'; 
require_once '../Includes/config.php';
require_once '../Includes/auth_check.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM advisors WHERE advisor_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Document</title>
</head>
<body>

    <main class="container">
        <div class="form-wrapper">
            <h2>Edit Advisor</h2>
            <form action="../Backend/update_advisor.php" method="POST">
                <input type="hidden" name="advisor_id" value="<?php echo $row['advisor_id']; ?>">
                
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Department:</label>
                    <select name="department_id" required class="form-select">
                        <?php
                        $deps = $conn->query("SELECT * FROM departments");
                        while($dep = $deps->fetch_assoc()) {
                            $selected = ($dep['department_id'] == $row['department_id']) ? 'selected' : '';
                            echo "<option value='{$dep['department_id']}' $selected>{$dep['department_name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>University Email:</label>
                    <input type="email" name="university_email" value="<?php echo $row['university_email']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Office Number:</label>
                    <input type="text" name="office_number" value="<?php echo $row['office_number']; ?>">
                </div>
                <div class="form-group">
                    <label>Phone Number:</label>
                    <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>">
                </div>
                
                <button type="submit" class="btn">Update Advisor</button>
            </form>
        </div>
    </main>
    <?php require_once '../Includes/footer.php'; ?>
</body>
</html>