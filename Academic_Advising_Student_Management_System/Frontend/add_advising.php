 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once '../Includes/header.php'; 
    require_once '../Includes/config.php';
    require_once '../Includes/auth_check.php';
    ?>
    <main class="container">
        <div class="form-wrapper">
            <h2>Schedule New Advising Session</h2>
            <form action="../Backend/add_advising.php" method="POST">
                <div class="form-group">
                    <label>Student:</label>
                    <select name="student_id" class="form-select" required>
                        <?php
                        $res = $conn->query("SELECT student_id, first_name, last_name FROM students");
                        while($row = $res->fetch_assoc()) {
                            echo "<option value='{$row['student_id']}'>{$row['first_name']} {$row['last_name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Advisor:</label>
                    <select name="advisor_id" class="form-select" required>
                        <?php
                        $res = $conn->query("SELECT advisor_id, first_name, last_name FROM advisors");
                        while($row = $res->fetch_assoc()) {
                            echo "<option value='{$row['advisor_id']}'>{$row['first_name']} {$row['last_name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Date:</label>
                    <input type="date" name="session_date" required>
                </div>
                <div class="form-group">
                    <label>Time:</label>
                    <input type="time" name="session_time" required>
                </div>
                <div class="form-group">
                    <label>Notes:</label>
                    <textarea name="advising_notes"></textarea>
                </div>
                <div class="form-group">
                    <label>Recommendations:</label>
                    <textarea name="recommendations"></textarea>
                </div>
                
                <button type="submit" class="btn">Save Session</button>
            </form>
        </div>
    </main>


    
</body>
</html>