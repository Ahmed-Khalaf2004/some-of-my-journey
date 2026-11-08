 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>advising</title>
</head>
<body>
    <main class="container">
        <?php 
        require_once '../Includes/header.php'; 
        require_once '../Includes/config.php';
        ?>
        <div class="page-header">
            <h1>Advising Sessions</h1>
            <a href="add_advising.php" class="btn-add">+ New Session</a>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Advisor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Notes</th>
                    <th>Recommendations</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // تحديث الاستعلام ليشمل الحقول الجديدة
            $sql = "SELECT s.first_name AS s_name, a.first_name AS a_name, 
                        ad.session_date, ad.session_time, ad.advising_notes, ad.recommendations 
                    FROM advising_sessions ad
                    JOIN students s ON ad.student_id = s.student_id
                    JOIN advisors a ON ad.advisor_id = a.advisor_id";

            $result = $conn->query($sql);

            if ($result) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                <td>{$row['s_name']}</td>
                <td>{$row['a_name']}</td>
                <td>{$row['session_date']}</td>
                <td>{$row['session_time']}</td>
                <td>" . substr($row['advising_notes'], 0, 30) . "...</td>
                <td>" . substr($row['recommendations'], 0, 30) . "...</td>
            </tr>";
                }
            } else {
                echo "Error: " . $conn->error;
            }
            ?>
            </tbody>
        </table>
    <?php require_once '../Includes/footer.php'; ?>
    </main>
</body>
</html>